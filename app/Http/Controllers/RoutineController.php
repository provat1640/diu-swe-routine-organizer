<?php

namespace App\Http\Controllers;

use App\Models\AcademicRoutine;
use App\Models\CourseOffering;
use App\Services\CourseIntegrationService;
use App\Services\FacultyService;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Illuminate\Support\Collection;
use Illuminate\Support\Facades\Cache;
use Illuminate\Support\Facades\DB;
use Illuminate\Validation\Rule;
use Illuminate\View\View;

class RoutineController extends Controller
{
    private const BATCHES = [40, 41, 42, 43, 44, 45, 46, 47, 48, 49];

    private const TRACKS = ['SE', 'DS', 'RE', 'ST', 'CS'];

    private const SWE_ROOMS = AcademicRoutine::SWE_DEDICATED_ROOMS;

    /**
     * Display the comprehensive SWE department routine matrix and dashboards.
     */
    public function index(Request $request): View
    {
        $batch = (int) $request->input('batch', 49);
        $section = strtoupper(trim((string) $request->input('section', 'A')));
        $track = $request->filled('major_track') ? strtoupper(trim((string) $request->input('major_track'))) : null;
        $facultyQuery = $request->filled('faculty_initials') ? strtoupper(trim((string) $request->input('faculty_initials'))) : null;
        $courseSearch = $request->filled('course_search') ? strtoupper(trim(str_replace(' ', '', (string) $request->input('course_search')))) : null;

        // View mode: 'grid' (weekly matrix) or 'cards' (day-by-day)
        $viewMode = $request->input('view_mode', 'grid');

        // Empty rooms filter defaults
        $emptyDay = $request->input('empty_day', 'Saturday');
        $emptySlot = $request->input('empty_slot', '08:30:00 - 10:00:00');
        [$emptyStartTime, $emptyEndTime] = $this->parseTimeSlot($emptySlot);

        $activeTab = $request->input('tab', 'routine');
        if ($facultyQuery && ! $request->has('tab')) {
            $activeTab = 'faculty';
        } elseif ($request->has('empty_day') && ! $request->has('tab')) {
            $activeTab = 'empty_rooms';
        } elseif ($courseSearch && ! $request->has('tab')) {
            $activeTab = 'custom';
        }

        // 1. Core Batch & Section Routine Query (Database-Agnostic Day Sorting)
        $routineQuery = DB::table('academic_routines')
            ->where('batch', $batch);

        if (! empty($section)) {
            $routineQuery->where(function ($q) use ($section) {
                $q->where('section', $section)
                    ->orWhere('section', 'LIKE', $section.'%');
            });
        }

        if (! empty($track) && $batch === 41) {
            $routineQuery->where(function ($q) use ($track) {
                $q->where('major_track', $track)
                    ->orWhereNull('major_track');
            });
        }

        $rawRoutines = $routineQuery->orderBy('start_time')->get();
        $normalizedRoutines = CourseIntegrationService::normalizeCollection($rawRoutines);
        $routines = $this->organizeByDay($normalizedRoutines);

        // Build Weekly Timetable Matrix with Conflict & Span Resolution
        $timeSlots = AcademicRoutine::TIME_SLOTS;
        $resolvedGrid = CourseIntegrationService::buildConflictResolvedGrid($rawRoutines, $timeSlots);
        $weeklyGrid = $resolvedGrid['grid'];
        $softConflicts = $resolvedGrid['soft_conflicts'];
        $hasConflicts = $resolvedGrid['has_conflicts'];
        if (! empty($resolvedGrid['irregular_slots'])) {
            $timeSlots = array_merge($timeSlots, $resolvedGrid['irregular_slots']);
        }

        // 2. Faculty Schedules Search by Initial or Full Name
        $facultyRoutines = collect();
        $facultyInfo = null;
        $facultyWeeklyGrid = [];
        $facultySoftConflicts = [];
        $facultyHasConflicts = false;
        $facultyViewMode = $request->input('faculty_view_mode', 'grid');
        if (! empty($facultyQuery)) {
            // Check if user searched an initial or part of a name
            $matchedFacultyInitials = [];
            $allFaculties = FacultyService::search($facultyQuery);
            if (! empty($allFaculties)) {
                $matchedFacultyInitials = array_keys($allFaculties);
            }
            if (empty($matchedFacultyInitials)) {
                $matchedFacultyInitials = [$facultyQuery];
            }

            $rawFaculty = DB::table('academic_routines')
                ->whereIn('teacher_initials', $matchedFacultyInitials)
                ->orderBy('start_time')
                ->get();
            $normalizedFaculty = CourseIntegrationService::normalizeCollection($rawFaculty);
            $facultyRoutines = $this->organizeByDay($normalizedFaculty);
            $facultyInfo = FacultyService::getFaculty($facultyQuery);

            $facultyResolved = CourseIntegrationService::buildConflictResolvedGrid($rawFaculty, $timeSlots);
            $facultyWeeklyGrid = $facultyResolved['grid'];
            $facultySoftConflicts = $facultyResolved['soft_conflicts'];
            $facultyHasConflicts = $facultyResolved['has_conflicts'];
        }

        // 3. Dedicated SWE Empty Room Tracker (evaluated when on empty_rooms tab or explicitly requested)
        $roomAnalysis = $activeTab === 'empty_rooms'
            ? $this->analyzeEmptyRooms($emptyDay, $emptyStartTime, $emptyEndTime)
            : ['rooms' => [], 'available_count' => 0, 'occupied_count' => 0];

        // 4. Customizable Routine Engine (Irregular / Cross-Batch)
        $courseSearchResults = collect();
        if ($activeTab === 'custom' && ! empty($courseSearch)) {
            $rawSearch = DB::table('academic_routines')
                ->where('course_id', 'LIKE', "%{$courseSearch}%")
                ->orderBy('batch')
                ->orderBy('section')
                ->orderBy('start_time')
                ->get();
            $normalizedSearch = CourseIntegrationService::normalizeCollection($rawSearch);
            $courseSearchResults = $this->organizeByDay($normalizedSearch);
        }

        // Selected custom routine slots from session
        $customSlotIds = session('custom_routine_slots', []);
        $customRoutines = collect();
        $customWeeklyGrid = [];
        $customSoftConflicts = [];
        $customHasConflicts = false;
        if (! empty($customSlotIds)) {
            $rawCustom = DB::table('academic_routines')
                ->whereIn('id', $customSlotIds)
                ->orderBy('start_time')
                ->get();
            $normalizedCustom = CourseIntegrationService::normalizeCollection($rawCustom);
            $customRoutines = $this->organizeByDay($normalizedCustom);
            $customResolved = CourseIntegrationService::buildConflictResolvedGrid($rawCustom, $timeSlots);
            $customWeeklyGrid = $customResolved['grid'];
            $customSoftConflicts = $customResolved['soft_conflicts'];
            $customHasConflicts = $customResolved['has_conflicts'];
        }

        // 5. Course Offerings Directory (lazy evaluated when tab is active)
        $offeringBatch = (int) $request->input('offering_batch', $batch ?: 41);
        $offeringTrack = $request->filled('offering_track') ? strtoupper(trim((string) $request->input('offering_track'))) : null;
        if ($offeringBatch !== 41) {
            $offeringTrack = null;
        }

        if ($activeTab === 'offerings') {
            $offeringsQuery = CourseOffering::query();
            if ($offeringBatch > 0) {
                $offeringsQuery->where('batch', $offeringBatch);
            }
            if (! empty($offeringTrack) && $offeringTrack !== 'ALL') {
                $offeringsQuery->where('major_track', $offeringTrack);
            }
            $offerings = $offeringsQuery->orderBy('batch')->orderBy('course_code')->get();
        } else {
            $offerings = collect();
        }
        $offeringsCount = Cache::remember('course_offerings_total_count', 3600, fn () => CourseOffering::count());

        // Metadata helpers for view dropdowns
        $availableBatches = self::BATCHES;
        $availableTracks = [
            'SE' => 'SE • Software Engineering',
            'DS' => 'DS • Data Science',
            'ST' => 'ST • Software Testing',
            'RE' => 'RE • Robotics Engineering',
            'CS' => 'CS • Cyber Security',
        ];
        $popularFaculty = Cache::remember('popular_faculty_initials_v3', 3600, function () {
            $leaveInitials = array_keys(FacultyService::getOnLeave());

            return DB::table('academic_routines')
                ->select('teacher_initials', DB::raw('count(*) as count'))
                ->where('teacher_initials', '!=', 'TBA')
                ->whereNotIn('teacher_initials', $leaveInitials)
                ->groupBy('teacher_initials')
                ->orderByDesc('count')
                ->limit(24)
                ->pluck('teacher_initials')
                ->all();
        });

        if (! is_array($popularFaculty)) {
            $popularFaculty = is_object($popularFaculty) && method_exists($popularFaculty, 'all')
                ? $popularFaculty->all()
                : [];
        }

        $maxSection = $batch === 40 ? 'F' : ($batch === 41 ? 'L' : (in_array($batch, [43, 44, 45]) ? 'N' : 'M'));
        $sectionsList = range('A', $maxSection);

        $days = array_keys(AcademicRoutine::DAY_ORDER);
        $dedicatedRooms = AcademicRoutine::SWE_DEDICATED_ROOMS;
        $facultyDirectory = FacultyService::all();

        return view('routine_dashboard', compact(
            'routines',
            'weeklyGrid',
            'softConflicts',
            'hasConflicts',
            'viewMode',
            'batch',
            'section',
            'sectionsList',
            'track',
            'facultyQuery',
            'facultyRoutines',
            'facultyInfo',
            'facultyWeeklyGrid',
            'facultySoftConflicts',
            'facultyHasConflicts',
            'facultyViewMode',
            'popularFaculty',
            'emptyDay',
            'emptySlot',
            'roomAnalysis',
            'courseSearch',
            'courseSearchResults',
            'customSlotIds',
            'customRoutines',
            'customWeeklyGrid',
            'customSoftConflicts',
            'customHasConflicts',
            'offerings',
            'offeringsCount',
            'offeringBatch',
            'offeringTrack',
            'availableBatches',
            'availableTracks',
            'timeSlots',
            'days',
            'dedicatedRooms',
            'activeTab',
            'facultyDirectory'
        ));
    }

    /**
     * Download the weekly routine as an exceptionally well-formatted Excel-compatible CSV file.
     * Generates the identical Time x Day timetable grid matrix requested by the user, followed by detailed records.
     * Supports both Batch/Section routines and Teacher Initial-based routines.
     */
    public function exportCsv(Request $request): Response
    {
        $facultyQuery = $request->filled('faculty_initials') ? strtoupper(trim((string) $request->input('faculty_initials'))) : null;
        $batch = (int) $request->input('batch', 49);
        $sectionInput = trim((string) $request->input('section', 'A'));
        $section = strtoupper($sectionInput);
        $track = $request->filled('major_track') ? strtoupper(trim((string) $request->input('major_track'))) : null;

        $timeSlots = AcademicRoutine::TIME_SLOTS;
        $days = ['Saturday', 'Sunday', 'Monday', 'Tuesday', 'Wednesday', 'Thursday', 'Friday'];

        if (! empty($facultyQuery)) {
            $facultyInfo = FacultyService::getFaculty($facultyQuery);
            $query = DB::table('academic_routines')
                ->whereRaw('UPPER(teacher_initials) = ?', [$facultyQuery]);
            $raw = $query->orderBy('start_time')->get();
            $normalizedRaw = CourseIntegrationService::normalizeCollection($raw);
            $routines = $this->organizeByDay($normalizedRaw)->flatten(1);

            $resolvedGrid = CourseIntegrationService::buildConflictResolvedGrid($raw, $timeSlots);
            $weeklyGrid = $resolvedGrid['grid'];
            if (! empty($resolvedGrid['irregular_slots'])) {
                $timeSlots = array_merge($timeSlots, $resolvedGrid['irregular_slots']);
            }

            $stream = fopen('php://temp', 'r+');
            fwrite($stream, "\xEF\xBB\xBF");

            // Header for Faculty
            fputcsv($stream, [
                "DIU SWE Faculty Schedule — {$facultyInfo['name']} ({$facultyQuery})",
                "Designation: {$facultyInfo['designation']}",
                'Academic Session: Fall 2026',
            ], escape: '\\');
            fputcsv($stream, [], escape: '\\');

            // 1. EXACT WEEKLY TIMETABLE MATRIX FOR FACULTY
            fputcsv($stream, [
                'Time',
                'Saturday',
                'Sunday',
                'Monday',
                'Tuesday',
                'Wednesday',
                'Thursday',
                'Friday',
            ], escape: '\\');

            foreach ($timeSlots as $slot) {
                $timeHeader = $slot['short'] ?? $slot['label'];
                $row = [$timeHeader];
                foreach ($days as $day) {
                    $classes = $weeklyGrid[$day][$slot['label']] ?? [];
                    if (empty($classes)) {
                        $row[] = ($day === 'Friday') ? 'Weekend' : '—';
                    } else {
                        $cellItems = [];
                        foreach ($classes as $c) {
                            $prefix = '';
                            if (! empty($c->is_continuation)) {
                                $prefix = '[Continuation] ';
                            } elseif (! empty($c->is_conflict)) {
                                $prefix = '['.($c->conflict_label ?? 'Concurrent').'] ';
                            }
                            $cellItems[] = sprintf(
                                '%s%s: %s | Batch %s-%s | Room %s (%s)',
                                $prefix,
                                $c->course_id,
                                $c->course_name,
                                $c->batch,
                                $c->section,
                                $c->classroom_no,
                                $c->building
                            );
                        }
                        $row[] = implode(" \n ", $cellItems);
                    }
                }
                fputcsv($stream, $row, escape: '\\');
            }

            // 2. DETAILED FACULTY CLASS SCHEDULE RECORDS BELOW
            fputcsv($stream, [], escape: '\\');
            fputcsv($stream, ['--- DETAILED FACULTY CLASS SCHEDULE RECORDS ---'], escape: '\\');
            fputcsv($stream, [
                'SL',
                'Day',
                'Time Slot',
                'Start Time',
                'End Time',
                'Course Code',
                'Course Title',
                'Teacher Initials',
                'Teacher Full Name',
                'Designation',
                'Room No',
                'Building',
                'Batch',
                'Section',
                'Track',
                'Semester',
            ], escape: '\\');

            $sl = 1;
            foreach ($routines as $r) {
                fputcsv($stream, [
                    $sl++,
                    $r->day_of_week,
                    $r->time_slot_formatted,
                    $r->start_time_formatted,
                    $r->end_time_formatted,
                    $r->course_id,
                    $r->course_name,
                    $r->teacher_initials,
                    $r->teacher_name,
                    $r->teacher_designation,
                    $r->classroom_no,
                    $r->building,
                    $r->batch,
                    $r->section,
                    $r->major_track ?? 'Core',
                    'Fall 2026',
                ], escape: '\\');
            }

            rewind($stream);
            $csv = stream_get_contents($stream);
            fclose($stream);

            $filename = "DIU_SWE_Teacher_{$facultyQuery}_Weekly_Routine.csv";

            return response($csv, 200, [
                'Content-Type' => 'text/csv; charset=UTF-8',
                'Content-Disposition' => "attachment; filename=\"{$filename}\"",
            ]);
        }

        $query = DB::table('academic_routines')->where('batch', $batch);
        if (! empty($section) && $section !== 'ALL') {
            $query->where(function ($q) use ($section) {
                $q->where('section', $section)->orWhere('section', 'LIKE', $section.'%');
            });
        }
        if (! empty($track) && $batch === 41) {
            $query->where(function ($q) use ($track) {
                $q->where('major_track', $track)->orWhereNull('major_track');
            });
        }

        $raw = $query->orderBy('start_time')->get();
        $normalizedRaw = CourseIntegrationService::normalizeCollection($raw);
        $routines = $this->organizeByDay($normalizedRaw)->flatten(1);

        $resolvedGrid = CourseIntegrationService::buildConflictResolvedGrid($raw, $timeSlots);
        $weeklyGrid = $resolvedGrid['grid'];
        if (! empty($resolvedGrid['irregular_slots'])) {
            $timeSlots = array_merge($timeSlots, $resolvedGrid['irregular_slots']);
        }

        $stream = fopen('php://temp', 'r+');
        // UTF-8 BOM for Microsoft Excel compatibility
        fwrite($stream, "\xEF\xBB\xBF");

        // 1. EXACT WEEKLY TIMETABLE MATRIX (Matches Routine Screen and Exported Image)
        fputcsv($stream, [
            'Time',
            'Saturday',
            'Sunday',
            'Monday',
            'Tuesday',
            'Wednesday',
            'Thursday',
            'Friday',
        ], escape: '\\');

        foreach ($timeSlots as $slot) {
            $timeHeader = $slot['short'] ?? $slot['label'];
            $row = [$timeHeader];
            foreach ($days as $day) {
                $classes = $weeklyGrid[$day][$slot['label']] ?? [];
                if (empty($classes)) {
                    $row[] = ($day === 'Friday') ? 'Weekend' : '—';
                } else {
                    $cellItems = [];
                    foreach ($classes as $c) {
                        $prefix = '';
                        if (! empty($c->is_continuation)) {
                            $prefix = '[Continuation] ';
                        } elseif (! empty($c->is_conflict)) {
                            $prefix = '['.($c->conflict_label ?? 'Concurrent').'] ';
                        }
                        $cellItems[] = sprintf(
                            '%s%s: %s | %s (%s) | Room %s (%s)',
                            $prefix,
                            $c->course_id,
                            $c->course_name,
                            $c->teacher_initials,
                            $c->teacher_name,
                            $c->classroom_no,
                            $c->building
                        );
                    }
                    $row[] = implode(" \n ", $cellItems);
                }
            }
            fputcsv($stream, $row, escape: '\\');
        }

        // 2. DETAILED CLASS SCHEDULE RECORDS BELOW
        fputcsv($stream, [], escape: '\\');
        fputcsv($stream, ['--- DETAILED CLASS SCHEDULE RECORDS ---'], escape: '\\');
        fputcsv($stream, [
            'SL',
            'Day',
            'Time Slot',
            'Start Time',
            'End Time',
            'Course Code',
            'Course Title',
            'Teacher Initials',
            'Teacher Full Name',
            'Designation',
            'Room No',
            'Building',
            'Batch',
            'Section',
            'Track',
            'Semester',
        ], escape: '\\');

        $sl = 1;
        foreach ($routines as $r) {
            fputcsv($stream, [
                $sl++,
                $r->day_of_week,
                $r->time_slot_formatted,
                $r->start_time_formatted,
                $r->end_time_formatted,
                $r->course_id,
                $r->course_name,
                $r->teacher_initials,
                $r->teacher_name,
                $r->teacher_designation,
                $r->classroom_no,
                $r->building,
                $r->batch,
                $r->section,
                $r->major_track ?? 'Core',
                'Fall 2026',
            ], escape: '\\');
        }

        rewind($stream);
        $csv = stream_get_contents($stream);
        fclose($stream);

        $sectionLabel = (! empty($section) && $section !== 'ALL') ? "Section_{$section}" : 'All_Sections';
        $filename = "DIU_SWE_Batch_{$batch}_{$sectionLabel}_Weekly_Routine.csv";

        return response($csv, 200, [
            'Content-Type' => 'text/csv; charset=UTF-8',
            'Content-Disposition' => "attachment; filename=\"{$filename}\"",
        ]);
    }

    /**
     * Export routine as standard RFC-5545 iCalendar (.ics) for Microsoft Outlook and Teams Calendar.
     * Supports both Batch/Section routines and Teacher Initial-based routines.
     */
    public function exportIcs(Request $request): Response
    {
        $facultyQuery = $request->filled('faculty_initials') ? strtoupper(trim((string) $request->input('faculty_initials'))) : null;
        if (! empty($facultyQuery)) {
            $facultyInfo = FacultyService::getFaculty($facultyQuery);
            $query = DB::table('academic_routines')
                ->whereRaw('UPPER(teacher_initials) = ?', [$facultyQuery]);
            $rawRoutines = $query->orderBy('day_of_week')->orderBy('start_time')->get();
            $routines = CourseIntegrationService::normalizeCollection($rawRoutines);
            $ics = $this->buildFacultyIcalendarData($routines, $facultyQuery, $facultyInfo);
            $filename = "DIU_SWE_Teacher_{$facultyQuery}_Outlook_Calendar.ics";

            return response($ics, 200, [
                'Content-Type' => 'text/calendar; charset=utf-8',
                'Content-Disposition' => "attachment; filename=\"{$filename}\"",
            ]);
        }

        $batch = (int) $request->input('batch', 41);
        $section = strtoupper(trim((string) $request->input('section', 'A')));
        $track = $request->filled('major_track') ? strtoupper(trim((string) $request->input('major_track'))) : null;

        $query = DB::table('academic_routines')->where('batch', $batch);

        if (! empty($section) && $section !== 'ALL') {
            $query->where('section', $section);
        }

        if (! empty($track) && $track !== 'ALL') {
            $query->where('major_track', $track);
        }

        $rawRoutines = $query->orderBy('day_of_week')->orderBy('start_time')->get();
        $routines = CourseIntegrationService::normalizeCollection($rawRoutines);

        $ics = $this->buildIcalendarData($routines, $batch, $section, $track);

        $sectionLabel = (! empty($section) && $section !== 'ALL') ? "Section_{$section}" : 'All_Sections';
        $filename = "DIU_SWE_Batch_{$batch}_{$sectionLabel}_Outlook_Calendar.ics";

        return response($ics, 200, [
            'Content-Type' => 'text/calendar; charset=utf-8',
            'Content-Disposition' => "attachment; filename=\"{$filename}\"",
        ]);
    }

    /**
     * Generate RFC-5545 compliant iCalendar string for a specific faculty member.
     *
     * @param  Collection<int, object>  $routines
     * @param  array{name: string, designation: string}  $facultyInfo
     */
    protected function buildFacultyIcalendarData(Collection $routines, string $initial, array $facultyInfo): string
    {
        $dayMap = [
            'Saturday' => ['BYDAY' => 'SA', 'offset' => 0],
            'Sunday' => ['BYDAY' => 'SU', 'offset' => 1],
            'Monday' => ['BYDAY' => 'MO', 'offset' => 2],
            'Tuesday' => ['BYDAY' => 'TU', 'offset' => 3],
            'Wednesday' => ['BYDAY' => 'WE', 'offset' => 4],
            'Thursday' => ['BYDAY' => 'TH', 'offset' => 5],
            'Friday' => ['BYDAY' => 'FR', 'offset' => 6],
        ];

        $lines = [];
        $lines[] = 'BEGIN:VCALENDAR';
        $lines[] = 'VERSION:2.0';
        $lines[] = 'PRODID:-//Daffodil International University//DIU SWE Routine Organizer//EN';
        $lines[] = 'CALSCALE:GREGORIAN';
        $lines[] = 'METHOD:PUBLISH';
        $lines[] = "X-WR-CALNAME:DIU SWE Faculty {$initial} ({$facultyInfo['name']}) Schedule";
        $lines[] = 'X-WR-TIMEZONE:Asia/Dhaka';

        $baseDate = '2026-09-19';

        foreach ($routines as $idx => $r) {
            $dayInfo = $dayMap[$r->day_of_week] ?? ['BYDAY' => 'SA', 'offset' => 0];
            $eventDate = date('Ymd', strtotime("{$baseDate} +{$dayInfo['offset']} days"));

            $startClean = str_replace(':', '', $r->start_time);
            $endClean = str_replace(':', '', $r->end_time);

            $dtStart = "{$eventDate}T{$startClean}";
            $dtEnd = "{$eventDate}T{$endClean}";

            $uid = "diu-swe-faculty-{$initial}-slot-{$r->id}-{$idx}@diu.edu.bd";
            $summary = "{$r->course_id}: {$r->course_name} (Batch {$r->batch}-{$r->section})";
            $location = "Room {$r->classroom_no}, {$r->building}, Daffodil Smart City";
            $description = "Course: {$r->course_name} ({$r->course_id})\\nInstructor: {$facultyInfo['name']} ({$initial}) - {$facultyInfo['designation']}\\nBatch: {$r->batch}, Section: {$r->section}\\nRoom: {$r->classroom_no} ({$r->building})";

            $lines[] = 'BEGIN:VEVENT';
            $lines[] = "UID:{$uid}";
            $lines[] = 'DTSTAMP:'.gmdate('Ymd\THis\Z');
            $lines[] = "DTSTART;TZID=Asia/Dhaka:{$dtStart}";
            $lines[] = "DTEND;TZID=Asia/Dhaka:{$dtEnd}";
            $lines[] = "RRULE:FREQ=WEEKLY;UNTIL=20261231T235959Z;BYDAY={$dayInfo['BYDAY']}";
            $lines[] = "SUMMARY:{$summary}";
            $lines[] = "LOCATION:{$location}";
            $lines[] = "DESCRIPTION:{$description}";
            $lines[] = 'STATUS:CONFIRMED';
            $lines[] = 'END:VEVENT';
        }

        $lines[] = 'END:VCALENDAR';

        return implode("\r\n", $lines)."\r\n";
    }

    /**
     * Generate RFC-5545 compliant iCalendar string with weekly recurrence rules.
     *
     * @param  Collection<int, object>  $routines
     */
    protected function buildIcalendarData(Collection $routines, int $batch, string $section, ?string $track = null): string
    {
        $dayMap = [
            'Saturday' => ['BYDAY' => 'SA', 'offset' => 0],
            'Sunday' => ['BYDAY' => 'SU', 'offset' => 1],
            'Monday' => ['BYDAY' => 'MO', 'offset' => 2],
            'Tuesday' => ['BYDAY' => 'TU', 'offset' => 3],
            'Wednesday' => ['BYDAY' => 'WE', 'offset' => 4],
            'Thursday' => ['BYDAY' => 'TH', 'offset' => 5],
            'Friday' => ['BYDAY' => 'FR', 'offset' => 6],
        ];

        $lines = [];
        $lines[] = 'BEGIN:VCALENDAR';
        $lines[] = 'VERSION:2.0';
        $lines[] = 'PRODID:-//Daffodil International University//DIU SWE Routine Organizer//EN';
        $lines[] = 'CALSCALE:GREGORIAN';
        $lines[] = 'METHOD:PUBLISH';
        $lines[] = "X-WR-CALNAME:DIU SWE Batch {$batch} ({$section}) Routine";
        $lines[] = 'X-WR-TIMEZONE:Asia/Dhaka';

        $baseDate = '2026-09-19';

        foreach ($routines as $idx => $r) {
            $dayInfo = $dayMap[$r->day_of_week] ?? ['BYDAY' => 'SA', 'offset' => 0];
            $eventDate = date('Ymd', strtotime("{$baseDate} +{$dayInfo['offset']} days"));

            $startClean = str_replace(':', '', $r->start_time);
            $endClean = str_replace(':', '', $r->end_time);

            $dtStart = "{$eventDate}T{$startClean}";
            $dtEnd = "{$eventDate}T{$endClean}";

            $uid = "diu-swe-b{$batch}-s{$section}-slot-{$r->id}-{$idx}@diu.edu.bd";
            $summary = "{$r->course_id}: {$r->course_name}";
            $location = "Room {$r->classroom_no}, {$r->building}, Daffodil Smart City";
            $description = "Course: {$r->course_name} ({$r->course_id})\\nInstructor: {$r->teacher_name} ({$r->teacher_initials}) - {$r->teacher_designation}\\nBatch: {$r->batch}, Section: {$r->section}\\nRoom: {$r->classroom_no} ({$r->building})";

            $lines[] = 'BEGIN:VEVENT';
            $lines[] = "UID:{$uid}";
            $lines[] = 'DTSTAMP:'.gmdate('Ymd\THis\Z');
            $lines[] = "DTSTART;TZID=Asia/Dhaka:{$dtStart}";
            $lines[] = "DTEND;TZID=Asia/Dhaka:{$dtEnd}";
            $lines[] = "RRULE:FREQ=WEEKLY;UNTIL=20261231T235959Z;BYDAY={$dayInfo['BYDAY']}";
            $lines[] = "SUMMARY:{$summary}";
            $lines[] = "LOCATION:{$location}";
            $lines[] = "DESCRIPTION:{$description}";
            $lines[] = 'STATUS:CONFIRMED';
            $lines[] = 'END:VEVENT';
        }

        $lines[] = 'END:VCALENDAR';

        return implode("\r\n", $lines)."\r\n";
    }

    /**
     * Build a structured 2D weekly grid [Day][TimeSlotLabel] = array of slots.
     *
     * @param  Collection<int, object>  $routines
     * @return array<string, array<string, array<int, object>>>
     */
    protected function buildWeeklyGrid(Collection $routines): array
    {
        $resolved = CourseIntegrationService::buildConflictResolvedGrid($routines, AcademicRoutine::TIME_SLOTS);

        return $resolved['grid'];
    }

    /**
     * Add or remove a slot from the customizable routine engine (session-backed).
     */
    public function toggleCustomSlot(Request $request): RedirectResponse|JsonResponse
    {
        $slotId = (int) $request->input('slot_id');
        $slots = session('custom_routine_slots', []);

        if (in_array($slotId, $slots, true)) {
            $slots = array_values(array_diff($slots, [$slotId]));
            $action = 'removed';
        } else {
            if ($slotId > 0 && DB::table('academic_routines')->where('id', $slotId)->exists()) {
                $slots[] = $slotId;
                $action = 'added';
            } else {
                $action = 'not_found';
            }
        }

        session(['custom_routine_slots' => array_unique($slots)]);

        if ($request->wantsJson()) {
            return response()->json([
                'status' => 'success',
                'action' => $action,
                'slot_id' => $slotId,
                'total_selected' => count($slots),
                'selected_slots' => $slots,
            ]);
        }

        return back()->with('status', "Custom routine slot {$action} successfully.");
    }

    /**
     * Clear all selected custom routine slots.
     */
    public function clearCustomRoutine(Request $request): RedirectResponse|JsonResponse
    {
        session()->forget('custom_routine_slots');

        if ($request->wantsJson()) {
            return response()->json([
                'status' => 'success',
                'message' => 'Custom routine reset successfully.',
            ]);
        }

        return back()->with('status', 'Custom routine cleared.');
    }

    /**
     * Store a new routine slot.
     */
    public function store(Request $request): JsonResponse
    {
        $data = $request->validate($this->routineRules());
        $routine = AcademicRoutine::create($data);

        return response()->json(['status' => 'success', 'payload' => $routine], 201);
    }

    /**
     * JSON Faculty schedule endpoint.
     */
    public function faculty(Request $request): JsonResponse
    {
        $initial = strtoupper(trim((string) ($request->input('initial') ?? $request->input('faculty_initials'))));
        if (empty($initial)) {
            return response()->json(['status' => 'error', 'message' => 'Initial parameter is required.'], 422);
        }

        $facultyInfo = FacultyService::getFaculty($initial);
        $rows = AcademicRoutine::query()
            ->whereRaw('UPPER(teacher_initials) = ?', [$initial])
            ->orderBy('day_of_week')->orderBy('start_time')->orderBy('id')->get();
        $normalizedRows = CourseIntegrationService::normalizeCollection($rows);

        return $this->featureResponse(
            'faculty_schedule',
            ['initial' => $initial, 'faculty_info' => $facultyInfo],
            $this->organizeByDay($normalizedRows)
        );
    }

    /**
     * JSON Custom routine lookup endpoint.
     */
    public function custom(Request $request): JsonResponse
    {
        $data = $request->validate([
            'course_codes' => ['required', 'array', 'min:1', 'max:20'],
            'course_codes.*' => ['required', 'string', 'max:20'],
        ]);

        $codes = collect($data['course_codes'])->map(fn ($code) => strtoupper(trim($code)))->unique()->values()->all();
        $rows = AcademicRoutine::query()->whereIn(DB::raw('UPPER(course_id)'), $codes)->orderBy('start_time')->orderBy('id')->get();
        $normalizedRows = CourseIntegrationService::normalizeCollection($rows);

        session()->put('custom_routine_course_codes', $codes);

        return $this->featureResponse('custom_routine', ['course_codes' => $codes], $this->organizeByDay($normalizedRows));
    }

    /**
     * JSON Empty rooms endpoint.
     */
    public function emptyRooms(Request $request): JsonResponse
    {
        $data = $request->validate([
            'day' => ['required', Rule::in(AcademicRoutine::weekdays())],
            'time' => ['nullable', 'date_format:H:i:s'],
            'time_slot' => ['nullable', 'string'],
        ]);

        $day = $data['day'];
        $timeSlot = $data['time_slot'] ?? '08:30:00 - 10:00:00';
        [$startTime, $endTime] = $this->parseTimeSlot($timeSlot, $data['time'] ?? null, null);

        $analysis = $this->analyzeEmptyRooms($day, $startTime, $endTime);

        return $this->featureResponse('empty_rooms', ['day' => $day, 'start_time' => $startTime, 'end_time' => $endTime], $analysis);
    }

    /**
     * RESTful JSON Routine endpoint for batch/section routine matrix.
     */
    public function apiRoutine(Request $request): JsonResponse
    {
        $batch = (int) $request->input('batch', 49);
        $section = strtoupper(trim((string) $request->input('section', 'A')));
        $track = $request->filled('major_track') ? strtoupper(trim((string) $request->input('major_track'))) : null;

        $query = DB::table('academic_routines')->where('batch', $batch);
        if (! empty($section) && $section !== 'ALL') {
            $query->where(function ($q) use ($section) {
                $q->where('section', $section)->orWhere('section', 'LIKE', $section.'%');
            });
        }
        if (! empty($track) && $batch === 41) {
            $query->where(function ($q) use ($track) {
                $q->where('major_track', $track)->orWhereNull('major_track');
            });
        }

        $raw = $query->orderBy('start_time')->get();
        $normalized = CourseIntegrationService::normalizeCollection($raw);
        $resolved = CourseIntegrationService::buildConflictResolvedGrid($raw, AcademicRoutine::TIME_SLOTS);

        return response()->json([
            'status' => 'success',
            'meta' => [
                'batch' => $batch,
                'section' => $section,
                'major_track' => $track,
                'total_classes' => $normalized->count(),
            ],
            'payload' => [
                'routines' => $this->organizeByDay($normalized),
                'weekly_grid' => $resolved['grid'],
                'has_conflicts' => $resolved['has_conflicts'],
                'conflicts' => $resolved['soft_conflicts'],
            ],
        ]);
    }

    /**
     * RESTful JSON Course Offerings endpoint.
     */
    public function apiOfferings(Request $request): JsonResponse
    {
        $batch = (int) $request->input('batch', 41);
        $track = $request->filled('major_track') ? strtoupper(trim((string) $request->input('major_track'))) : null;

        $query = CourseOffering::query();
        if ($batch > 0) {
            $query->where('batch', $batch);
        }
        if (! empty($track) && $track !== 'ALL') {
            $query->where('major_track', $track);
        }
        $offerings = $query->orderBy('batch')->orderBy('course_code')->get();

        return response()->json([
            'status' => 'success',
            'meta' => [
                'batch' => $batch,
                'major_track' => $track,
                'total_courses' => $offerings->count(),
            ],
            'payload' => $offerings,
        ]);
    }

    /**
     * Organize records using database-agnostic PHP collection day sorting.
     */
    protected function organizeByDay(Collection $collection): Collection
    {
        $dayOrder = AcademicRoutine::DAY_ORDER;

        return $collection->sortBy(function ($item) use ($dayOrder) {
            $day = is_object($item) ? $item->day_of_week : ($item['day_of_week'] ?? '');

            return $dayOrder[$day] ?? 99;
        })->groupBy('day_of_week');
    }

    /**
     * Compute available and occupied rooms from the dedicated SWE room matrix.
     *
     * @return array{rooms: array<int, array<string, mixed>>, available_count: int, occupied_count: int}
     */
    protected function analyzeEmptyRooms(string $day, string $startTime, string $endTime): array
    {
        $dedicatedRooms = AcademicRoutine::SWE_DEDICATED_ROOMS;

        $occupiedRoutines = DB::table('academic_routines')
            ->where('day_of_week', $day)
            ->where('start_time', '<', $endTime)
            ->where('end_time', '>', $startTime)
            ->get();

        $occupiedMap = [];
        foreach ($occupiedRoutines as $routine) {
            $occupiedMap[$routine->classroom_no] = $routine;
        }

        $roomList = [];
        $availableCount = 0;
        $occupiedCount = 0;

        foreach ($dedicatedRooms as $room) {
            $building = AcademicRoutine::resolveBuilding($room);

            if (isset($occupiedMap[$room])) {
                $occ = $occupiedMap[$room];
                $occupiedCount++;
                $faculty = FacultyService::getFaculty($occ->teacher_initials);

                $roomList[] = [
                    'room_no' => $room,
                    'building' => $building,
                    'status' => 'Occupied',
                    'occupied_by' => [
                        'course_id' => $occ->course_id,
                        'teacher_initials' => $occ->teacher_initials,
                        'teacher_name' => $faculty['name'],
                        'batch' => $occ->batch,
                        'section' => $occ->section,
                        'major_track' => $occ->major_track,
                        'time' => date('h:i A', strtotime($occ->start_time)).' - '.date('h:i A', strtotime($occ->end_time)),
                    ],
                ];
            } else {
                $availableCount++;
                $roomList[] = [
                    'room_no' => $room,
                    'building' => $building,
                    'status' => 'Available / Empty',
                    'occupied_by' => null,
                ];
            }
        }

        return [
            'rooms' => $roomList,
            'available_count' => $availableCount,
            'occupied_count' => $occupiedCount,
        ];
    }

    /**
     * Parse standard time slot strings into [startTime, endTime].
     *
     * @return array{0: string, 1: string}
     */
    protected function parseTimeSlot(string $slotString, ?string $fallbackStart = null, ?string $fallbackEnd = null): array
    {
        if ($fallbackStart && $fallbackEnd) {
            return [
                date('H:i:s', strtotime($fallbackStart)),
                date('H:i:s', strtotime($fallbackEnd)),
            ];
        }

        $parts = explode('-', $slotString);
        if (count($parts) === 2) {
            $start = date('H:i:s', strtotime(trim($parts[0])));
            $end = date('H:i:s', strtotime(trim($parts[1])));
            if ($start && $end) {
                return [$start, $end];
            }
        }

        return ['08:30:00', '10:00:00'];
    }

    private function routineRules(): array
    {
        return [
            'semester' => ['nullable', 'string', 'max:20'],
            'year' => ['nullable', 'digits:4'],
            'batch' => ['required', 'integer', Rule::in(self::BATCHES)],
            'section' => ['required', 'string', 'max:5'],
            'major_track' => ['nullable', Rule::in(self::TRACKS)],
            'course_id' => ['required', 'string', 'max:20'],
            'teacher_initials' => ['required', 'string', 'max:10'],
            'classroom_no' => ['required', 'string', 'max:20'],
            'building' => ['required', 'string', 'max:20'],
            'day_of_week' => ['required', Rule::in(AcademicRoutine::weekdays())],
            'start_time' => ['required', 'date_format:H:i:s'],
            'end_time' => ['required', 'date_format:H:i:s', 'after:start_time'],
        ];
    }

    private function featureResponse(string $feature, array $meta, mixed $payload): JsonResponse
    {
        return response()->json([
            'status' => 'success',
            'feature' => $feature,
            'meta' => $meta,
            'payload' => $payload,
        ]);
    }
}
