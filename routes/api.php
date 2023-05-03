<?php

use App\Http\Controllers\ApiController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});

// Students
Route::get('students', [ApiController::class, 'getStudents']);
Route::post('student/get', [ApiController::class, 'getStudent']);
Route::post('student/create', [ApiController::class, 'createStudent']);
Route::post('student/update', [ApiController::class, 'updateStudent']);
Route::post('student/delete', [ApiController::class, 'deleteStudent']);

// Classrooms
Route::get('classrooms', [ApiController::class, 'getClassrooms']);
Route::post('classroom/get', [ApiController::class, 'getClassroom']);
Route::post('classroom-plan/get', [ApiController::class, 'getClassroomPlan']);
Route::post('classroom-plan/create', [ApiController::class, 'createUpdateClassroomPlan']);
Route::post('classroom/create', [ApiController::class, 'createClassroom']);
Route::post('classroom/update', [ApiController::class, 'updateClassroom']);
Route::post('classroom/delete', [ApiController::class, 'deleteClassroom']);

// Lectures
Route::get('lectures', [ApiController::class, 'getLectures']);
Route::post('lecture/create', [ApiController::class, 'createLecture']);
Route::post('lecture/update', [ApiController::class, 'updateLecture']);
Route::post('lecture/delete', [ApiController::class, 'deleteLecture']);
Route::post('lecture/get', [ApiController::class, 'getLecture']);

