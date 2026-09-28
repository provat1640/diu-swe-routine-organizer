<?php

namespace App\Http\Controllers;

use App\Models\AcademicRoutine;
use App\Models\CourseOffering;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Collection;
use Illuminate\Support\Facades\DB;
use Illuminate\View\View;

class RoutineController extends Controller
{
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

        // 2. Faculty Schedules Search by Initial
        $facultyRoutines = collect();
        if (! empty($facultyQuery)) {
            $rawFaculty = DB::table('academic_routines')
                ->where('teacher_initials', $facultyQuery)
                ->orderBy('start_time')
                ->get();
            $facultyRoutines = $this->organizeByDay($rawFaculty);
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
        if (! empty($customSlotIds)) {
            $rawCustom = DB::table('academic_routines')
                ->whereIn('id', $customSlotIds)
                ->orderBy('start_time')
                ->get();
            $customRoutines = $this->organizeByDay($rawCustom);
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
        $availableBatches = [40, 41, 42, 43, 44, 45, 46, 47, 48, 49];
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

        return view('routine_dashboard', compact(
            'routines',
            'batch',
            'section',
            'track',
            'facultyQuery',
            'facultyRoutines',
            'popularFaculty',
            'emptyDay',
            'emptySlot',
            'roomAnalysis',
            'courseSearch',
            'courseSearchResults',
            'customSlotIds',
            'customRoutines',
            'offerings',
            'offeringBatch',
            'offeringTrack',
            'availableBatches',
            'timeSlots',
            'days',
            'dedicatedRooms',
            'activeTab'
        ));
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
     * Mobile Synchronization Unified JSON Interface (REST APIs).
     *
     * Serves lightweight JSON payloads targeting /api/v1/android-sync.
     */
    public function androidSync(Request $request): JsonResponse
    {
        $feature = $request->input('feature');

        // Auto-detect feature if not explicitly passed
        if (empty($feature)) {
            if ($request->filled('teacher') || $request->filled('faculty_initials')) {
                $feature = 'faculty_search';
            } elseif ($request->filled('empty_day') || ($request->filled('day_of_week') && ! $request->filled('batch'))) {
                $feature = 'empty_rooms';
            } elseif ($request->filled('course_code') || $request->filled('course_search')) {
                $feature = 'custom_routine';
            } elseif ($request->input('type') === 'offerings' || $request->filled('offering_batch')) {
                $feature = 'course_offerings';
            } elseif ($request->input('type') === 'meta') {
                $feature = 'meta';
            } else {
                $feature = 'routine';
            }
        }

        return match ($feature) {
            'faculty_search' => $this->syncFacultySearch($request),
            'empty_rooms' => $this->syncEmptyRooms($request),
            'custom_routine', 'course_search' => $this->syncCourseSearch($request),
            'course_offerings' => $this->syncCourseOfferings($request),
            'meta' => $this->syncMeta($request),
            default => $this->syncRoutine($request),
        };
    }

    /**
     * Legacy alias for android sync endpoint.
     */
    public function getMobileJson(Request $request): JsonResponse
    {
        return $this->androidSync($request);
    }

    /**
     * Sync routine by batch, section, and optional track.
     */
    protected function syncRoutine(Request $request): JsonResponse
    {
        $batch = (int) $request->input('batch', 49);
        $section = strtoupper(trim((string) $request->input('section', 'A')));
        $track = $request->filled('major_track') ? strtoupper(trim((string) $request->input('major_track'))) : null;

        $query = DB::table('academic_routines')->where('batch', $batch);

        if (! empty($section)) {
            $query->where(function ($q) use ($section) {
                $q->where('section', $section)
                    ->orWhere('section', 'LIKE', $section.'%');
            });
        }

        if (! empty($track) && $batch === 41) {
            $query->where(function ($q) use ($track) {
                $q->where('major_track', $track)
                    ->orWhereNull('major_track');
            });
        }

        $rawCollection = $query->orderBy('start_time')->get();
        $sortedCollection = $this->organizeByDay($rawCollection);

        $flatList = $sortedCollection->flatten(1)->values();

        return response()->json([
            'status' => 'success',
            'client' => 'Android Integration Layer',
            'feature' => 'routine',
            'meta' => [
                'batch' => $batch,
                'section' => $section,
                'major_track' => $track,
                'total_slots' => $flatList->count(),
            ],
            'payload' => $flatList,
        ], 200);
    }

    /**
     * Sync faculty schedule by initials.
     */
    protected function syncFacultySearch(Request $request): JsonResponse
    {
        $teacher = strtoupper(trim((string) ($request->input('teacher') ?? $request->input('faculty_initials'))));

        if (empty($teacher)) {
            return response()->json([
                'status' => 'error',
                'client' => 'Android Integration Layer',
                'message' => 'Missing teacher or faculty_initials query parameter.',
            ], 400);
        }

        $raw = DB::table('academic_routines')
            ->where('teacher_initials', $teacher)
            ->orderBy('start_time')
            ->get();

        $sorted = $this->organizeByDay($raw)->flatten(1)->values();

        return response()->json([
            'status' => 'success',
            'client' => 'Android Integration Layer',
            'feature' => 'faculty_search',
            'meta' => [
                'teacher_initials' => $teacher,
                'total_classes' => $sorted->count(),
            ],
            'payload' => $sorted,
        ], 200);
    }

    /**
     * Sync empty rooms analysis.
     */
    protected function syncEmptyRooms(Request $request): JsonResponse
    {
        $day = $request->input('day_of_week') ?? $request->input('empty_day') ?? 'Sunday';
        $timeSlot = $request->input('time_slot') ?? $request->input('empty_slot') ?? '10:00:00 - 11:30:00';
        [$startTime, $endTime] = $this->parseTimeSlot($timeSlot, $request->input('start_time'), $request->input('end_time'));

        $analysis = $this->analyzeEmptyRooms($day, $startTime, $endTime);

        $payload = array_map(function ($item) {
            return [
                'room_no' => $item['room_no'],
                'building' => $item['building'],
                'status' => $item['status'],
                'occupied_by' => $item['occupied_by'] ?? null,
            ];
        }, $analysis['rooms']);

        return response()->json([
            'status' => 'success',
            'client' => 'Android Integration Layer',
            'feature' => 'empty_rooms',
            'meta' => [
                'day_of_week' => $day,
                'start_time' => $startTime,
                'end_time' => $endTime,
                'total_dedicated' => count(AcademicRoutine::SWE_DEDICATED_ROOMS),
                'available_count' => $analysis['available_count'],
                'occupied_count' => $analysis['occupied_count'],
            ],
            'payload' => array_values($payload),
        ], 200);
    }

    /**
     * Sync course search for custom routine.
     */
    protected function syncCourseSearch(Request $request): JsonResponse
    {
        $courseCode = strtoupper(trim(str_replace(' ', '', (string) ($request->input('course_code') ?? $request->input('course_search')))));

        if (empty($courseCode)) {
            return response()->json([
                'status' => 'error',
                'client' => 'Android Integration Layer',
                'message' => 'Missing course_code parameter.',
            ], 400);
        }

        $raw = DB::table('academic_routines')
            ->where('course_id', 'LIKE', "%{$courseCode}%")
            ->orderBy('batch')
            ->orderBy('section')
            ->orderBy('start_time')
            ->get();

        $sorted = $this->organizeByDay($raw)->flatten(1)->values();

        return response()->json([
            'status' => 'success',
            'client' => 'Android Integration Layer',
            'feature' => 'custom_routine',
            'meta' => [
                'course_code' => $courseCode,
                'total_sections' => $sorted->count(),
            ],
            'payload' => $sorted,
        ], 200);
    }

    /**
     * Sync course offerings.
     */
    protected function syncCourseOfferings(Request $request): JsonResponse
    {
        $batch = (int) $request->input('batch', 0);
        $track = $request->input('major_track');

        $query = CourseOffering::query();
        if ($batch > 0) {
            $query->where('batch', $batch);
        }
        if (! empty($track)) {
            $query->where(function ($q) use ($track) {
                $q->where('major_track', $track)
                    ->orWhereNull('major_track');
            });
        }

        $offerings = $query->orderBy('batch')->orderBy('course_code')->get();

        return response()->json([
            'status' => 'success',
            'client' => 'Android Integration Layer',
            'feature' => 'course_offerings',
            'meta' => [
                'batch' => $batch ?: 'All',
                'major_track' => $track ?: 'All',
                'total_courses' => $offerings->count(),
            ],
            'payload' => $offerings,
        ], 200);
    }

    /**
     * Sync system metadata dictionary for Android clients.
     */
    protected function syncMeta(Request $request): JsonResponse
    {
        return response()->json([
            'status' => 'success',
            'client' => 'Android Integration Layer',
            'feature' => 'meta',
            'meta' => [
                'semester' => 'Fall',
                'year' => '2026',
            ],
            'payload' => [
                'batches' => [40, 41, 42, 43, 44, 45, 46, 47, 48, 49],
                'major_tracks' => ['SE', 'DS', 'RE', 'ST', 'CS'],
                'days' => array_keys(AcademicRoutine::DAY_ORDER),
                'time_slots' => AcademicRoutine::TIME_SLOTS,
                'dedicated_rooms' => AcademicRoutine::SWE_DEDICATED_ROOMS,
            ],
        ], 200);
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

        // Find active classes overlapping the requested interval
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
                $roomList[] = [
                    'room_no' => $room,
                    'building' => $building,
                    'status' => 'Occupied',
                    'occupied_by' => [
                        'course_id' => $occ->course_id,
                        'teacher_initials' => $occ->teacher_initials,
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
}
