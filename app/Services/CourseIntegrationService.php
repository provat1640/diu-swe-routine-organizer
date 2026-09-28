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
     * Convert HH:MM:SS or HH:MM string to total minutes from midnight for ultra-fast integer comparison.
     */
    public static function timeToMinutes(string $time): int
    {
        $parts = explode(':', trim($time));
        $hours = isset($parts[0]) ? (int) $parts[0] : 0;
        $minutes = isset($parts[1]) ? (int) $parts[1] : 0;

        return ($hours * 60) + $minutes;
    }

    /**
     * Normalize a single routine item with complete, synchronized metadata.
     * Includes memoization check to prevent redundant object churn.
     */
    public static function normalizeCourse(object $routine): object
    {
        if (! empty($routine->_is_normalized)) {
            return $routine;
        }

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
        $item->_is_normalized = true;

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
     * Optimized with O(N) day bucketing, minute-based integer comparisons,
     * and O(K) hash set conflict classification to minimize time and space complexity.
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

        // Pre-index time slots with integer minute boundaries for O(1) comparison
        $indexedSlots = [];
        $grid = [];
        foreach ($days as $day) {
            $grid[$day] = [];
        }

        foreach ($timeSlots as $slot) {
            $indexedSlots[] = [
                'start_min' => self::timeToMinutes($slot['start']),
                'end_min' => self::timeToMinutes($slot['end']),
                'start' => $slot['start'],
                'end' => $slot['end'],
                'label' => $slot['label'],
                'short' => $slot['short'] ?? $slot['label'],
            ];
            foreach ($days as $day) {
                $grid[$day][$slot['label']] = [];
            }
        }

        $irregularSlots = [];
        $softConflicts = [];

        // 1. O(N) Day Partitioning: Bucket routines by academic day
        $dayBuckets = [];
        foreach ($routines as $rawRoutine) {
            $routine = self::normalizeCourse($rawRoutine);
            $day = $routine->day_of_week;
            if (isset($grid[$day])) {
                $dayBuckets[$day][] = $routine;
            }
        }

        // 2. Precise interval overlap course assignment using minute comparisons
        foreach ($dayBuckets as $day => $dayRoutines) {
            foreach ($dayRoutines as $routine) {
                $rStartMin = self::timeToMinutes($routine->start_time);
                $rEndMin = self::timeToMinutes($routine->end_time);

                $matchedSlots = [];
                foreach ($indexedSlots as $idx => $slot) {
                    // Strict interval overlap condition using integer arithmetic
                    if ($rStartMin < $slot['end_min'] && $rEndMin > $slot['start_min']) {
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
                    // Course is scheduled at irregular or off-grid hours
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
        }

        // 3. Single-Pass Conflict Detection & Classification using Hash Sets: O(K) per cell
        foreach ($days as $day) {
            foreach ($grid[$day] as $slotLabel => $classesInSlot) {
                $count = count($classesInSlot);
                if ($count <= 1) {
                    continue;
                }

                // Single pass to collect tracks, sections, and check lab splits with O(1) sets
                $trackSet = [];
                $sectionSet = [];
                $coursesList = [];
                $hasLabSplit = false;

                foreach ($classesInSlot as $c) {
                    if (! empty($c->major_track)) {
                        $trackSet[$c->major_track] = true;
                    }
                    if (! empty($c->section)) {
                        $sectionSet[$c->section] = true;
                        if (! $hasLabSplit && preg_match('/[0-9]/', (string) $c->section)) {
                            $hasLabSplit = true;
                        }
                    }
                    $coursesList[] = "{$c->course_id} ({$c->section})";
                }

                $trackCount = count($trackSet);
                $sectionCount = count($sectionSet);

                if ($trackCount > 1) {
                    $conflictType = 'parallel_tracks';
                    $conflictLabel = 'Parallel Track Electives ('.implode('/', array_keys($trackSet)).')';
                } elseif ($sectionCount > 1 && $hasLabSplit) {
                    $conflictType = 'lab_subgroup_split';
                    $conflictLabel = 'Concurrent Lab Groups ('.implode('/', array_keys($sectionSet)).')';
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
                $softConflicts[] = [
                    'day' => $day,
                    'slot' => $slotLabel,
                    'type' => $conflictType,
                    'label' => $conflictLabel,
                    'count' => $count,
                    'courses' => $coursesList,
                ];

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
}
