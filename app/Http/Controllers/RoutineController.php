<?php

namespace App\Http\Controllers;

use App\Models\AcademicRoutine;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Validation\Rule;
use Illuminate\View\View;

class RoutineController extends Controller
{
    private const BATCHES = [40, 41, 42, 43, 44, 45, 46, 47, 48, 49];
    private const TRACKS = ['SE', 'DS', 'RE', 'ST', 'CS'];
    private const SWE_ROOMS = [
        'Annex-106', 'Annex-107', 'Annex-108', 'Annex-308', 'Annex-309',
        '610', '611', '612', '616', '710', '711A', '711B', '814A', '814B',
        '903', 'AB3-104', 'AB3-106', 'AB3-107',
    ];

    public function index(Request $request): View
    {
        $filters = $this->validatedFilters($request);
        $routines = $this->routineQuery($filters)->get();
        $routines = $this->groupByWeekday($routines);

        return view('routine_dashboard', array_merge($filters, [
            'routines' => $routines,
            'facultyResults' => collect(),
            'customRoutines' => collect(),
            'emptyRooms' => [],
        ]));
    }

    public function store(Request $request): JsonResponse
    {
        $data = $request->validate($this->routineRules());
        $routine = AcademicRoutine::create($data);

        return response()->json(['status' => 'success', 'payload' => $routine], 201);
    }

    public function faculty(Request $request): JsonResponse
    {
        $data = $request->validate(['initial' => ['required', 'string', 'max:10', 'regex:/^[A-Za-z0-9]+$/']]);
        $rows = AcademicRoutine::query()
            ->whereRaw('UPPER(teacher_initials) = ?', [strtoupper($data['initial'])])
            ->orderBy('day_of_week')->orderBy('start_time')->orderBy('id')->get();

        return $this->featureResponse('faculty_schedule', ['initial' => strtoupper($data['initial'])], $this->groupByWeekday($rows));
    }

    public function custom(Request $request): JsonResponse
    {
        $data = $request->validate([
            'course_codes' => ['required', 'array', 'min:1', 'max:20'],
            'course_codes.*' => ['required', 'string', 'max:20', 'regex:/^[A-Za-z0-9-]+$/'],
        ]);

        $codes = collect($data['course_codes'])->map(fn ($code) => strtoupper(trim($code)))->unique()->values()->all();
        $rows = AcademicRoutine::query()->whereIn(DB::raw('UPPER(course_id)'), $codes)->orderBy('start_time')->orderBy('id')->get();
        $selected = session()->put('custom_routine_course_codes', $codes);

        return $this->featureResponse('custom_routine', ['course_codes' => $codes], $this->groupByWeekday($rows));
    }

    public function emptyRooms(Request $request): JsonResponse
    {
        $data = $request->validate([
            'day' => ['required', Rule::in(AcademicRoutine::weekdays())],
            'time' => ['required', 'date_format:H:i:s'],
        ]);

        $time = $data['time'];
        $occupied = AcademicRoutine::query()
            ->where('day_of_week', $data['day'])
            ->where('start_time', '<=', $time)
            ->where('end_time', '>', $time)
            ->pluck('classroom_no')->map(fn ($room) => strtoupper(trim($room)))->unique();

        $rooms = collect(self::SWE_ROOMS)
            ->reject(fn ($room) => $occupied->contains(strtoupper($room)))
            ->values()->all();

        return $this->featureResponse('empty_rooms', ['day' => $data['day'], 'time' => $time], $rooms);
    }

    public function androidSync(Request $request): JsonResponse
    {
        $feature = $request->input('feature', 'routine');

        return match ($feature) {
            'faculty' => $this->faculty($request->merge(['initial' => $request->input('initial')])),
            'custom' => $this->custom($request),
            'empty_rooms' => $this->emptyRooms($request),
            'routine' => $this->routineJson($request),
            default => response()->json(['status' => 'error', 'message' => 'Unsupported feature.'], 422),
        };
    }

    public function getMobileJson(Request $request): JsonResponse
    {
        return $this->routineJson($request);
    }

    private function routineJson(Request $request): JsonResponse
    {
        $filters = $this->validatedFilters($request, true);
        $rows = $this->routineQuery($filters)->get();

        return $this->featureResponse('routine', $filters, $this->groupByWeekday($rows));
    }

    private function routineQuery(array $filters)
    {
        return AcademicRoutine::query()
            ->where('batch', $filters['batch'])
            ->where('section', $filters['section'])
            ->when($filters['track'], fn ($query) => $query->where('major_track', $filters['track']))
            ->orderBy('start_time')->orderBy('end_time')->orderBy('id');
    }

    private function groupByWeekday($rows)
    {
        $order = array_flip(AcademicRoutine::weekdays());

        return $rows->sortBy(fn ($row) => [$order[$row->day_of_week] ?? PHP_INT_MAX, $row->start_time, $row->id])->groupBy('day_of_week');
    }

    private function validatedFilters(Request $request, bool $api = false): array
    {
        $data = $request->validate([
            'batch' => ['nullable', 'integer', Rule::in(self::BATCHES)],
            'section' => ['nullable', 'string', 'size:1', 'regex:/^[A-N]$/'],
            'major_track' => ['nullable', 'string', Rule::in(self::TRACKS)],
        ]);
        $batch = (int) ($data['batch'] ?? 49);
        $max = $batch === 40 ? 'F' : ($batch === 41 ? 'L' : (in_array($batch, [43, 44, 45], true) ? 'N' : 'M'));
        $section = strtoupper($data['section'] ?? 'A');
        abort_unless(ord($section) <= ord($max), 422, 'The selected section is not valid for this batch.');

        return ['batch' => $batch, 'section' => $section, 'track' => $data['major_track'] ?? null];
    }

    private function routineRules(): array
    {
        return [
            'semester' => ['nullable', 'string', 'max:20'], 'year' => ['nullable', 'digits:4'],
            'batch' => ['required', 'integer', Rule::in(self::BATCHES)],
            'section' => ['required', 'string', 'size:1', 'regex:/^[A-N]$/'],
            'major_track' => ['nullable', Rule::in(self::TRACKS)], 'course_id' => ['required', 'string', 'max:20'],
            'teacher_initials' => ['required', 'string', 'max:10', 'regex:/^[A-Za-z0-9]+$/'],
            'classroom_no' => ['required', 'string', 'max:20'], 'building' => ['required', 'string', 'max:20'],
            'day_of_week' => ['required', Rule::in(AcademicRoutine::weekdays())],
            'start_time' => ['required', 'date_format:H:i:s'], 'end_time' => ['required', 'date_format:H:i:s', 'after:start_time'],
        ];
    }

    private function featureResponse(string $feature, array $meta, mixed $payload): JsonResponse
    {
        return response()->json(['status' => 'success', 'feature' => $feature, 'meta' => $meta, 'payload' => $payload]);
    }
}
