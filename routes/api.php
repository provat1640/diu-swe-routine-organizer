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
    Route::get('/faculty-schedule', [RoutineController::class, 'faculty'])->name('api.v1.faculty-schedule');
    Route::post('/custom-routine', [RoutineController::class, 'custom'])->name('api.v1.custom-routine');
    Route::get('/empty-rooms', [RoutineController::class, 'emptyRooms'])->name('api.v1.empty-rooms');
});
