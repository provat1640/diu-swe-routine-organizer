<?php

use App\Http\Controllers\RoutineController;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Exposes lightweight RESTful JSON endpoints for routine features.
|
*/

Route::prefix('v1')->group(function (): void {
    Route::get('/routine', [RoutineController::class, 'apiRoutine'])->name('api.v1.routine');
    Route::get('/faculty-schedule', [RoutineController::class, 'faculty'])->name('api.v1.faculty-schedule');
    Route::post('/custom-routine', [RoutineController::class, 'custom'])->name('api.v1.custom-routine');
    Route::post('/custom-routine/toggle', [RoutineController::class, 'toggleCustomSlot'])->name('api.v1.custom.toggle');
    Route::post('/custom-routine/clear', [RoutineController::class, 'clearCustomRoutine'])->name('api.v1.custom.clear');
    Route::get('/empty-rooms', [RoutineController::class, 'emptyRooms'])->name('api.v1.empty-rooms');
    Route::get('/course-offerings', [RoutineController::class, 'apiOfferings'])->name('api.v1.offerings');
});
