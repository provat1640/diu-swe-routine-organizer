<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\RoutineController;

Route::get('/', [RoutineController::class, 'index']);
Route::get('/api/v1/android-sync', [RoutineController::class, 'getMobileJson']);