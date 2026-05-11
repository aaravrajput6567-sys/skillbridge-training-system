<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ApiController;

Route::get('/user', function (Request $request) {
    return $request->user();
})->middleware('auth:sanctum');

Route::middleware('auth:sanctum')->group(function () {
    // API Routes for Trainings
    Route::get('/trainings', [ApiController::class, 'getTrainings']);
    Route::get('/trainings/{id}', [ApiController::class, 'getTraining']);
    Route::post('/trainings', [ApiController::class, 'storeTraining']);
    Route::put('/trainings/{id}', [ApiController::class, 'updateTraining']);
    Route::delete('/trainings/{id}', [ApiController::class, 'deleteTraining']);

    // API Routes for Employees
    Route::get('/employees', [ApiController::class, 'getEmployees']);
    Route::post('/employees', [ApiController::class, 'storeEmployee']);

    // API Routes for Enrollments
    Route::get('/enrollments', [ApiController::class, 'getEnrollments']);
    Route::post('/enrollments', [ApiController::class, 'storeEnrollment']);

    // API Routes for Attendance
    Route::get('/attendance', [ApiController::class, 'getAttendance']);
    Route::post('/attendance', [ApiController::class, 'storeAttendance']);
});
