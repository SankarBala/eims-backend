<?php

use App\Http\Controllers\Api\BatchController;
use App\Http\Controllers\Api\BranchController;
use App\Http\Controllers\Api\BuildingController;
use App\Http\Controllers\Api\ExamController;
use App\Http\Controllers\Api\GroupController;
use App\Http\Controllers\Api\GuardianController;
use App\Http\Controllers\Api\RoomController;
use App\Http\Controllers\Api\StudentController;
use App\Http\Controllers\Api\SubjectController;
use App\Http\Controllers\Api\TeacherController;
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

// Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
//     return $request->user();
// });


Route::apiResource('student', StudentController::class);
Route::apiResource('subject', SubjectController::class);
Route::apiResource('guardian', GuardianController::class);
Route::apiResource('branch', BranchController::class);
Route::apiResource('group', GroupController::class); 
Route::apiResource('teacher', TeacherController::class);
Route::apiResource('room', RoomController::class);
Route::apiResource('building', BuildingController::class);
Route::apiResource('exam', ExamController::class);
Route::apiResource('batch', BatchController ::class);