<?php

declare(strict_types=1);

use App\Http\Controllers\Api\CourseController;

Route::middleware('auth:sanctum')->group(function () {
    Route::apiResource('courses', CourseController::class)
        ->except(['index', 'show']);

    Route::post('courses/{course}/enroll', [CourseController::class, 'enroll']);
});

Route::get('courses', [CourseController::class, 'index']);
Route::get('courses/{course}', [CourseController::class, 'show']);
