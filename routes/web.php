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

// Customizable Routine Engine actions
Route::post('/custom-routine/toggle', [RoutineController::class, 'toggleCustomSlot'])->name('custom.toggle');
Route::post('/custom-routine/clear', [RoutineController::class, 'clearCustomRoutine'])->name('custom.clear');

// Direct Android Sync JSON API fallback under Web prefix
Route::match(['get', 'post'], '/api/v1/android-sync', [RoutineController::class, 'androidSync'])
    ->name('web.api.android-sync');

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
