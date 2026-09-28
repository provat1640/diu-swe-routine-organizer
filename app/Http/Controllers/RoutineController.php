<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class RoutineController extends Controller
{
    public function index(Request $request)
    {
        $batch = $request->input('batch', 49);
        $section = $request->input('section', 'A');
        $track = $request->input('major_track');

        $query = DB::table('academic_routines')
            ->where('batch', $batch)
            ->where('section', $section);

        if (!empty($track)) {
            $query->where('major_track', $track);
        }

        $routines = $query->orderBy(DB::raw("FIELD(day_of_week, 'Saturday', 'Sunday', 'Monday', 'Tuesday', 'Wednesday', 'Thursday', 'Friday')"))
            ->orderBy('start_time')
            ->get()
            ->groupBy('day_of_week');

        return view('routine_dashboard', compact('routines', 'batch', 'section', 'track'));
    }

    public function getMobileJson(Request $request)
    {
        $batch = $request->query('batch');
        $section = $request->query('section');
        $track = $request->query('major_track');

        if (!$batch || !$section) {
            return response()->json(['error' => 'Missing batch or section attributes'], 400);
        }

        $query = DB::table('academic_routines')
            ->where('batch', $batch)
            ->where('section', $section);

        if (!empty($track)) {
            $query->where('major_track', $track);
        }

        $data = $query->orderBy('day_of_week')->orderBy('start_time')->get();

        return response()->json([
            'status' => 'success',
            'client' => 'Android Integration Layer',
            'meta' => ['batch' => $batch, 'section' => $section, 'track' => $track],
            'payload' => $data
        ], 200);
    }
}