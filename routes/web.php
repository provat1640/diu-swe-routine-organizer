<?php

use App\Http\Controllers\RoutineController;
use Illuminate\Support\Facades\Route;

Route::get('/', [RoutineController::class, 'index'])->name('routine.dashboard');
Route::post('/routine', [RoutineController::class, 'store'])->name('routine.store');
Route::get('/routine/faculty', [RoutineController::class, 'faculty'])->name('routine.faculty');
Route::get('/routine/custom', [RoutineController::class, 'custom'])->name('routine.custom');
Route::get('/routine/empty-rooms', [RoutineController::class, 'emptyRooms'])->name('routine.empty-rooms');
Route::get('/api/v1/android-sync', [RoutineController::class, 'androidSync'])->name('routine.android-sync');
