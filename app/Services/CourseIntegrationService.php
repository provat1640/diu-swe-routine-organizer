<?php

namespace App\Services;

use App\Models\AcademicRoutine;
use Illuminate\Support\Collection;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Log;

class CourseIntegrationService
{
    /**
     * In-memory cache for course code => official course title mappings.
     *
     * @var array<string, string>|null
     */
    protected static ?array $courseTitleCache = null;

    /**
     * Resolve official course title for a given course code.
     */
    public static function resolveCourseName(string $courseCode): string
    {
        $code = strtoupper(trim($courseCode));
        if (empty($code)) {
            return '';
        }

        if (self::$courseTitleCache === null) {
            self::warmTitleCache();
        }

        return self::$courseTitleCache[$code] ?? $code;
    }

    /**
     * Warm up the course title dictionary from course_offerings and courses tables.
     */
    public static function warmTitleCache(): void
    {
        $fromOfferings = DB::table('course_offerings')
            ->whereNotNull('course_code')
            ->whereNotNull('course_name')
            ->pluck('course_name', 'course_code')
            ->toArray();

        $fromCourses = DB::table('courses')
            ->whereNotNull('course_id')
            ->whereNotNull('course_name')
            ->pluck('course_name', 'course_id')
            ->toArray();

        self::$courseTitleCache = array_change_key_case(array_merge($fromCourses, $fromOfferings), CASE_UPPER);
    }

    /**
     * Normalize a single routine item with complete, synchronized metadata.
     */
    public static function normalizeCourse(object $routine): object
    {
        $item = clone $routine;

        $code = strtoupper(trim((string) ($item->course_id ?? '')));
        $item->course_id = $code;
        $item->course_name = self::resolveCourseName($code);

        // Teacher metadata
        $initial = strtoupper(trim((string) ($item->teacher_initials ?? 'TBA')));
        $item->teacher_initials = $initial;
        $faculty = FacultyService::getFaculty($initial);
        $item->teacher_name = $faculty['name'] ?? $initial;
        $item->teacher_designation = $faculty['designation'] ?? 'Department Faculty';

        // Formatted times
        $startTime = date('H:i:s', strtotime($item->start_time));
        $endTime = date('H:i:s', strtotime($item->end_time));
        $item->start_time = $startTime;
        $item->end_time = $endTime;

        $startFormatted = date('h:i A', strtotime($startTime));
        $endFormatted = date('h:i A', strtotime($endTime));
        $item->start_time_formatted = $startFormatted;
        $item->end_time_formatted = $endFormatted;
        $item->time_slot_formatted = "{$startFormatted} - {$endFormatted}";
        $item->short_time = date('g:i', strtotime($startTime)).'-'.date('g:i', strtotime($endTime));

        // Location & Building
        $room = trim((string) ($item->classroom_no ?? 'TBA'));
        $item->classroom_no = $room;
        $item->building = ! empty($item->building) ? $item->building : AcademicRoutine::resolveBuilding($room);

        // Conflict & Continuation baseline flags
        $item->is_conflict = false;
        $item->conflict_type = null;
        $item->conflict_label = null;
        $item->conflict_count = 1;
        $item->is_continuation = false;
        $item->continuation_note = null;

        return $item;
    }

    /**
     * Normalize an entire collection of routine objects.
     */
    public static function normalizeCollection(Collection $routines): Collection
    {
        return $routines->map(function ($item) {
            return self::normalizeCourse($item);
        });
    }

    /**
     * Build the Weekly Timetable Grid with mathematical interval overlap checking,
     * multi-slot continuation handling, and automated soft-conflict detection.
     *
     * @param  Collection<int, object>  $routines
     * @param  array<int, array{start: string, end: string, label: string, short?: string}>  $timeSlots
     * @return array{
     *     grid: array<string, array<string, array<int, object>>>,
     *     soft_conflicts: array<int, array<string, mixed>>,
     *     irregular_slots: array<int, array<string, string>>,
     *     has_conflicts: bool
     * }
     */
    public static function buildConflictResolvedGrid(Collection $routines, array $timeSlots): array
    {
        $days = ['Saturday', 'Sunday', 'Monday', 'Tuesday', 'Wednesday', 'Thursday', 'Friday'];

        $grid = [];
        foreach ($days as $day) {
            $grid[$day] = [];
            foreach ($timeSlots as $slot) {
                $grid[$day][$slot['label']] = [];
            }
        }

        $irregularSlots = [];
        $softConflicts = [];

        // 1. Precise interval overlap course assignment
        foreach ($routines as $rawRoutine) {
            $routine = self::normalizeCourse($rawRoutine);
            $day = $routine->day_of_week;

            if (! in_array($day, $days, true)) {
                continue;
            }

            $matchedSlots = [];
            foreach ($timeSlots as $idx => $slot) {
                // Strict interval overlap condition:
                // An event [start, end] overlaps [slot_start, slot_end] if and only if
                // routine starts strictly before slot ends AND routine ends strictly after slot starts.
                // (Edge-to-edge back-to-back classes where start == slot_end do NOT overlap!)
                if ($routine->start_time < $slot['end'] && $routine->end_time > $slot['start']) {
                    $matchedSlots[] = [
                        'index' => $idx,
                        'slot' => $slot,
                        'is_first' => empty($matchedSlots),
                    ];
                }
            }

            if (! empty($matchedSlots)) {
                foreach ($matchedSlots as $match) {
                    $slotLabel = $match['slot']['label'];
                    $slotInstance = clone $routine;

                    if (! $match['is_first']) {
                        $slotInstance->is_continuation = true;
                        $slotInstance->continuation_note = "Continuation (Started {$routine->start_time_formatted})";
                    }

                    $grid[$day][$slotLabel][] = $slotInstance;
                }
            } else {
                // Course is scheduled at irregular or off-grid hours (outside standard 8:30-17:30)
                $irregularLabel = $routine->time_slot_formatted;
                if (! isset($grid[$day][$irregularLabel])) {
                    $grid[$day][$irregularLabel] = [];
                }
                $grid[$day][$irregularLabel][] = $routine;

                if (! isset($irregularSlots[$irregularLabel])) {
                    $irregularSlots[$irregularLabel] = [
                        'start' => $routine->start_time,
                        'end' => $routine->end_time,
                        'label' => $irregularLabel,
                        'short' => $routine->short_time,
                    ];
                }
            }
        }

        // 2. Conflict Detection & Classification Pass
        foreach ($days as $day) {
            foreach ($grid[$day] as $slotLabel => $classesInSlot) {
                $count = count($classesInSlot);
                if ($count <= 1) {
                    continue;
                }

                // Analyze the nature of the multi-course slot
                $tracks = [];
                $sections = [];
                $coursesList = [];

                foreach ($classesInSlot as $c) {
                    if (! empty($c->major_track)) {
                        $tracks[] = $c->major_track;
                    }
                    $sections[] = $c->section;
                    $coursesList[] = "{$c->course_id} ({$c->section})";
                }

                $uniqueTracks = array_unique(array_filter($tracks));
                $uniqueSections = array_unique($sections);

                if (count($uniqueTracks) > 1) {
                    $conflictType = 'parallel_tracks';
                    $conflictLabel = 'Parallel Track Electives ('.implode('/', $uniqueTracks).')';
                } elseif (count($uniqueSections) > 1 && self::isLabSplit($uniqueSections)) {
                    $conflictType = 'lab_subgroup_split';
                    $conflictLabel = 'Concurrent Lab Groups ('.implode('/', $uniqueSections).')';
                } else {
                    $conflictType = 'direct_clash';
                    $conflictLabel = "Schedule Overlap ({$count} Classes)";
                }

                // Tag each item in this cell
                foreach ($grid[$day][$slotLabel] as &$classItem) {
                    $classItem->is_conflict = true;
                    $classItem->conflict_type = $conflictType;
                    $classItem->conflict_label = $conflictLabel;
                    $classItem->conflict_count = $count;
                }
                unset($classItem);

                // Record soft conflict
                $conflictEntry = [
                    'day' => $day,
                    'slot' => $slotLabel,
                    'type' => $conflictType,
                    'label' => $conflictLabel,
                    'count' => $count,
                    'courses' => $coursesList,
                ];
                $softConflicts[] = $conflictEntry;

                // Log soft conflict for diagnostic tracking
                Log::info(sprintf(
                    'Soft Scheduling Conflict detected: Day=%s, Slot=%s, Type=%s, Courses=[%s]',
                    $day,
                    $slotLabel,
                    $conflictType,
                    implode(', ', $coursesList)
                ));
            }
        }

        return [
            'grid' => $grid,
            'soft_conflicts' => $softConflicts,
            'irregular_slots' => array_values($irregularSlots),
            'has_conflicts' => ! empty($softConflicts),
        ];
    }

    /**
     * Check if a set of sections represents a lab subgroup split (e.g. A1, A2).
     *
     * @param  array<int, string>  $sections
     */
    protected static function isLabSplit(array $sections): bool
    {
        $hasNumbered = false;
        foreach ($sections as $sec) {
            if (preg_match('/[0-9]/', $sec)) {
                $hasNumbered = true;
                break;
            }
        }

        return $hasNumbered;
    }
}
