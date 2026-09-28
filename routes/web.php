<?php

use App\Http\Controllers\ProfileController;
use App\Http\Controllers\RoutineController;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
*/

Route::get('/', [RoutineController::class, 'index'])->name('routine.index');
Route::get('/routine', [RoutineController::class, 'index'])->name('routine.dashboard');

// Routine export downloads
Route::get('/routine/export/csv', [RoutineController::class, 'exportCsv'])->name('routine.export.csv');

// Routine feature routes
Route::post('/routine', [RoutineController::class, 'store'])->name('routine.store');
Route::get('/routine/faculty', [RoutineController::class, 'faculty'])->name('routine.faculty');
Route::get('/routine/custom', [RoutineController::class, 'custom'])->name('routine.custom');
Route::get('/routine/empty-rooms', [RoutineController::class, 'emptyRooms'])->name('routine.empty-rooms');

// Customizable Routine Engine actions
Route::post('/custom-routine/toggle', [RoutineController::class, 'toggleCustomSlot'])->name('custom.toggle');
Route::post('/custom-routine/clear', [RoutineController::class, 'clearCustomRoutine'])->name('custom.clear');

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
