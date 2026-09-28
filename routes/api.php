<?php

use App\Http\Controllers\RoutineController;
use Illuminate\Support\Facades\Route;

Route::prefix('v1')->group(function (): void {
    Route::get('/routine', [RoutineController::class, 'getMobileJson']);
    Route::get('/faculty-schedule', [RoutineController::class, 'faculty']);
    Route::post('/custom-routine', [RoutineController::class, 'custom']);
    Route::get('/empty-rooms', [RoutineController::class, 'emptyRooms']);
    Route::match(['get', 'post'], '/android-sync', [RoutineController::class, 'androidSync']);
});
