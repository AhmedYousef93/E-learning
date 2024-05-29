<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Api\V1\{
    AdminController,
    SchoolController,
    LessonController,
    SectionController,
    CourseController,
    StudentController,
    LoginController
};

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "api" middleware group. Make something great!
|
*/
Route::middleware('guest:sanctum')->group(function () {
    Route::post('login', LoginController::class);
});

Route::middleware('auth:sanctum')->group(function () {
    // Admin routes
    Route::apiResource('admins', AdminController::class);
    Route::apiResource('schools', SchoolController::class);
    Route::apiResource('students', StudentController::class);

    // School routes
    Route::prefix('schools')->group(function () {
        Route::apiResource('{school}/classes', SchoolController::class);
        Route::apiResource('{school}/courses', CourseController::class);
    });

    // Class routes
    Route::prefix('classes')->group(function () {
        Route::post('{class}/students', [SchoolController::class, 'addStudentToClass']);
    });

    // Course routes
    Route::prefix('courses')->group(function () {
        Route::apiResource('{course}/sections', SectionController::class);
    });

    // Section routes
    Route::prefix('sections')->group(function () {
        Route::apiResource('{section}/lessons', LessonController::class);
    });
});
