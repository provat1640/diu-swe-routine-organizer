<?php

use App\Http\Controllers\ProfileController;
use App\Http\Controllers\RoutineController;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Schema;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
*/

Route::get('/', [RoutineController::class, 'index'])->name('routine.index');
Route::get('/routine', [RoutineController::class, 'index'])->name('routine.dashboard');

// Routine export downloads
Route::get('/routine/export/csv', [RoutineController::class, 'exportCsv'])->name('routine.export.csv');
Route::get('/routine/export/ics', [RoutineController::class, 'exportIcs'])->name('routine.export.ics');

// Routine feature routes
Route::post('/routine', [RoutineController::class, 'store'])->name('routine.store');
Route::get('/routine/faculty', [RoutineController::class, 'faculty'])->name('routine.faculty');
Route::get('/routine/custom', [RoutineController::class, 'custom'])->name('routine.custom');
Route::get('/routine/empty-rooms', [RoutineController::class, 'emptyRooms'])->name('routine.empty-rooms');

// Customizable Routine Engine actions
Route::post('/custom-routine/toggle', [RoutineController::class, 'toggleCustomSlot'])->name('custom.toggle');
Route::post('/custom-routine/clear', [RoutineController::class, 'clearCustomRoutine'])->name('custom.clear');

Route::get('/debug-check', function () {
    $dbPath = database_path('database.sqlite');
    $info = [
        'php_version' => PHP_VERSION,
        'app_env' => config('app.env'),
        'app_debug' => config('app.debug'),
        'db_connection' => config('database.default'),
        'sqlite_path' => $dbPath,
        'sqlite_exists' => file_exists($dbPath),
        'sqlite_size' => file_exists($dbPath) ? filesize($dbPath) : null,
        'sqlite_readable' => is_readable($dbPath),
        'sqlite_writable' => is_writable($dbPath),
        'storage_writable' => is_writable(storage_path()),
    ];

    try {
        $info['has_table'] = Schema::hasTable('academic_routines');
        $info['routines_count'] = DB::table('academic_routines')->count();
    } catch (Throwable $e) {
        $info['db_error'] = [
            'message' => $e->getMessage(),
            'class' => get_class($e),
        ];
    }

    return response()->json($info);
});

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

if (file_exists(__DIR__.'/auth.php')) {
    require __DIR__.'/auth.php';
}
