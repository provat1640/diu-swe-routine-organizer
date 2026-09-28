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

Route::match(['get', 'post'], '/v1/android-sync', [RoutineController::class, 'androidSync'])
    ->name('api.v1.android-sync');
