<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Api\UserController;
use App\Http\Controllers\Api\SkillController;
use App\Http\Controllers\Api\LectureController;
use App\Http\Controllers\Api\StudentController;
use App\Http\Controllers\Api\TeacherController;
use App\Http\Controllers\Api\LectureScheduleController;
use App\Http\Controllers\Api\TeachingMaterialController;
use App\Http\Controllers\Api\ApplicationOfLectureController;
use App\Http\Controllers\Api\TeamChatController;

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

// DBテーブル各々に対応したルーティング
// Route::resource([
//     'users' => UserController::class,
//     'skills' => SkillController::class,
//     'lectures' => LectureController::class,
//     'students' => StudentController::class,
//     'teachers' => TeacherController::class,
//     'lecture_schedules' => LectureScheduleController::class,
//     'teaching_materials' => TeachingMaterialController::class,
//     'application_of_lectures' => ApplicationOfLectureController::class,
//     'team_chats' => TeamChatController::class,
// ]);
