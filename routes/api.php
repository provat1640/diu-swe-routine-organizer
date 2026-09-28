<?php

use App\Http\Controllers\RoutineController;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Mobile Synchronization API Routes (Android Integration Layer)
|--------------------------------------------------------------------------
|
| Exposes lightweight RESTful JSON endpoints matching the DIU SWE Routine
| Organizer specifications defined in AI_INSTRUCTIONS.md.
|
*/

Route::prefix('v1')->group(function (): void {
    Route::get('/routine', [RoutineController::class, 'getMobileJson'])->name('api.v1.routine');
    Route::get('/faculty-schedule', [RoutineController::class, 'faculty'])->name('api.v1.faculty-schedule');
    Route::post('/custom-routine', [RoutineController::class, 'custom'])->name('api.v1.custom-routine');
    Route::get('/empty-rooms', [RoutineController::class, 'emptyRooms'])->name('api.v1.empty-rooms');
    Route::match(['get', 'post'], '/android-sync', [RoutineController::class, 'androidSync'])->name('api.v1.android-sync');
});
