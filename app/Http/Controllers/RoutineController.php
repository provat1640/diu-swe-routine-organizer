<?php

namespace App\Http\Controllers;

use App\Models\AcademicRoutine;
use App\Models\CourseOffering;
use App\Services\FacultyService;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Illuminate\Support\Collection;
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
        $routines = $this->organizeByDay($rawRoutines);

        // Build Weekly Timetable Matrix (Grid view: Days x TimeSlots)
        $weeklyGrid = $this->buildWeeklyGrid($rawRoutines);

        // 2. Faculty Schedules Search by Initial or Full Name
        $facultyRoutines = collect();
        $facultyInfo = null;
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
            $facultyRoutines = $this->organizeByDay($rawFaculty);
            $facultyInfo = FacultyService::getFaculty($facultyQuery);
        }

        // 3. Dedicated SWE Empty Room Tracker
        $roomAnalysis = $this->analyzeEmptyRooms($emptyDay, $emptyStartTime, $emptyEndTime);

        // 4. Customizable Routine Engine (Irregular / Cross-Batch)
        $courseSearchResults = collect();
        if (! empty($courseSearch)) {
            $rawSearch = DB::table('academic_routines')
                ->where('course_id', 'LIKE', "%{$courseSearch}%")
                ->orderBy('batch')
                ->orderBy('section')
                ->orderBy('start_time')
                ->get();
            $courseSearchResults = $this->organizeByDay($rawSearch);
        }

        // Selected custom routine slots from session
        $customSlotIds = session('custom_routine_slots', []);
        $customRoutines = collect();
        $customWeeklyGrid = [];
        if (! empty($customSlotIds)) {
            $rawCustom = DB::table('academic_routines')
                ->whereIn('id', $customSlotIds)
                ->orderBy('start_time')
                ->get();
            $customRoutines = $this->organizeByDay($rawCustom);
            $customWeeklyGrid = $this->buildWeeklyGrid($rawCustom);
        }

        // 5. Course Offerings Directory
        $offeringBatch = (int) $request->input('offering_batch', $batch);
        $offeringTrack = $request->input('offering_track');
        $offeringsQuery = CourseOffering::query();
        if ($offeringBatch > 0) {
            $offeringsQuery->where('batch', $offeringBatch);
        }
        if (! empty($offeringTrack)) {
            $offeringsQuery->where(function ($q) use ($offeringTrack) {
                $q->where('major_track', $offeringTrack)
                    ->orWhereNull('major_track');
            });
        }
        $offerings = $offeringsQuery->orderBy('batch')->orderBy('course_code')->get();

        // Metadata helpers for view dropdowns
        $availableBatches = self::BATCHES;
        $popularFaculty = DB::table('academic_routines')
            ->select('teacher_initials', DB::raw('count(*) as count'))
            ->where('teacher_initials', '!=', 'TBA')
            ->groupBy('teacher_initials')
            ->orderByDesc('count')
            ->limit(24)
            ->pluck('teacher_initials');

        $timeSlots = AcademicRoutine::TIME_SLOTS;
        $days = array_keys(AcademicRoutine::DAY_ORDER);
        $dedicatedRooms = AcademicRoutine::SWE_DEDICATED_ROOMS;
        $facultyDirectory = FacultyService::all();

        return view('routine_dashboard', compact(
            'routines',
            'weeklyGrid',
            'viewMode',
            'batch',
            'section',
            'track',
            'facultyQuery',
            'facultyRoutines',
            'facultyInfo',
            'popularFaculty',
            'emptyDay',
            'emptySlot',
            'roomAnalysis',
            'courseSearch',
            'courseSearchResults',
            'customSlotIds',
            'customRoutines',
            'customWeeklyGrid',
            'offerings',
            'offeringBatch',
            'offeringTrack',
            'availableBatches',
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
     */
    public function exportCsv(Request $request): Response
    {
        $batch = (int) $request->input('batch', 49);
        $sectionInput = trim((string) $request->input('section', 'A'));
        $section = strtoupper($sectionInput);
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
        $routines = $this->organizeByDay($raw)->flatten(1);
        $weeklyGrid = $this->buildWeeklyGrid($raw);

        // Fetch course code -> course title mapping
        $courseTitles = DB::table('course_offerings')
            ->whereNotNull('course_code')
            ->whereNotNull('course_name')
            ->pluck('course_name', 'course_code')
            ->toArray();

        $days = ['Saturday', 'Sunday', 'Monday', 'Tuesday', 'Wednesday', 'Thursday', 'Friday'];
        $timeSlots = AcademicRoutine::TIME_SLOTS;

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
                        $fac = FacultyService::getFaculty($c->teacher_initials);
                        $courseTitle = $c->course_name ?? ($courseTitles[$c->course_id] ?? DB::table('courses')->where('course_id', $c->course_id)->value('course_name') ?? $c->course_id);
                        $cellItems[] = sprintf(
                            '%s: %s | %s (%s) | Room %s (%s)',
                            $c->course_id,
                            $courseTitle,
                            $c->teacher_initials,
                            $fac['name'],
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
            $fac = FacultyService::getFaculty($r->teacher_initials);
            $courseCode = trim((string) $r->course_id);
            $courseTitle = $courseTitles[$courseCode] ?? DB::table('courses')->where('course_id', $courseCode)->value('course_name') ?? $courseCode;
            $startTimeFormatted = date('h:i A', strtotime($r->start_time));
            $endTimeFormatted = date('h:i A', strtotime($r->end_time));
            $timeSlot = "{$startTimeFormatted} - {$endTimeFormatted}";

            fputcsv($stream, [
                $sl++,
                $r->day_of_week,
                $timeSlot,
                $startTimeFormatted,
                $endTimeFormatted,
                $courseCode,
                $courseTitle,
                $r->teacher_initials,
                $fac['name'],
                $fac['designation'],
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
     * Build a structured 2D weekly grid [Day][TimeSlotLabel] = array of slots.
     *
     * @param  Collection<int, object>  $routines
     * @return array<string, array<string, array<int, object>>>
     */
    protected function buildWeeklyGrid(Collection $routines): array
    {
        $days = ['Saturday', 'Sunday', 'Monday', 'Tuesday', 'Wednesday', 'Thursday', 'Friday'];
        $timeSlots = AcademicRoutine::TIME_SLOTS;

        $courseTitles = DB::table('course_offerings')
            ->whereNotNull('course_code')
            ->whereNotNull('course_name')
            ->pluck('course_name', 'course_code')
            ->toArray();

        $grid = [];
        foreach ($days as $day) {
            $grid[$day] = [];
            foreach ($timeSlots as $slot) {
                $grid[$day][$slot['label']] = [];
            }
        }

        foreach ($routines as $routine) {
            $day = $routine->day_of_week;
            if (! isset($grid[$day])) {
                continue;
            }

            // Attach course_name for direct display
            $routine->course_name = $courseTitles[$routine->course_id] ?? DB::table('courses')->where('course_id', $routine->course_id)->value('course_name') ?? $routine->course_id;

            // Match into the closest time slot
            $routineStart = date('H:i:s', strtotime($routine->start_time));
            $matchedSlotLabel = null;

            foreach ($timeSlots as $slot) {
                if ($routineStart >= $slot['start'] && $routineStart < $slot['end']) {
                    $matchedSlotLabel = $slot['label'];
                    break;
                }
            }

            if (! $matchedSlotLabel) {
                // Fallback to formatted time string
                $matchedSlotLabel = date('h:i A', strtotime($routine->start_time)).' - '.date('h:i A', strtotime($routine->end_time));
            }

            if (! isset($grid[$day][$matchedSlotLabel])) {
                $grid[$day][$matchedSlotLabel] = [];
            }

            $grid[$day][$matchedSlotLabel][] = $routine;
        }

        return $grid;
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

        return $this->featureResponse(
            'faculty_schedule',
            ['initial' => $initial, 'faculty_info' => $facultyInfo],
            $this->organizeByDay($rows)
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

        session()->put('custom_routine_course_codes', $codes);

        return $this->featureResponse('custom_routine', ['course_codes' => $codes], $this->organizeByDay($rows));
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
