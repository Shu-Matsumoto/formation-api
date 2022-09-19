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
use App\Http\Controllers\Api\SignupController;
use App\Http\Controllers\Api\ApplyboxController;
use App\Http\Controllers\Api\ImageController;
use App\Http\Controllers\Api\PaymentController;
use App\Http\Controllers\Api\ProfileController;
use App\Http\Controllers\Api\StudyController;
use App\Http\Controllers\Api\VideolinkController;

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

// ログイン関連
Route::post('/signup', [SignupController::class, 'signup']); //->name('api.signup.post');

// ユーザー関連
Route::resource('/users', UserController::class)->except(['create', 'edit']);
Route::get('/{userId}/profile', [ProfileController::class, 'show']);
Route::put('/{userId}/profile', [ProfileController::class, 'update']);
Route::get('/{userId}/payment', [PaymentController::class, 'show']);
Route::put('/{userId}/payment', [PaymentController::class, 'update']);
Route::resource('/skills', SkillController::class)->except(['create', 'edit']);
Route::get('/{userId}/skills', [SkillController::class, 'list']);
Route::put('/{userId}/image', [ImageController::class, 'store']);

// 講義関連
Route::resource('/lectures', LectureController::class)->except(['create', 'edit']);
Route::get('/{userId}/lectures', [LectureController::class, 'list']);
Route::get('/lectures/{lectureId}/detail', [LectureController::class, 'showdetail']);
Route::resource('/students', StudentController::class)->except(['create', 'edit']);
Route::get('/{userId}/students', [StudentController::class, 'list']);
Route::resource('/teachers', TeacherController::class)->except(['create', 'edit']);
Route::get('/{userId}/teachers', [TeacherController::class, 'list']);
Route::resource('/lecture_schedules', LectureScheduleController::class)->except(['create', 'edit']);
Route::get('/{lectureId}/lecture_schedules', [LectureScheduleController::class, 'list']);
Route::resource('/teaching_materials', TeachingMaterialController::class)->except(['create', 'edit']);
Route::get('/{lectureId}/teaching_materials', [TeachingMaterialController::class, 'list']);
Route::resource('/team_chats', TeamChatController::class)->except(['create', 'edit']);
Route::get('/{lectureId}/team_chats', [TeamChatController::class, 'list']);
Route::get('/{userId}/studies', [StudyController::class, 'list']);
Route::get('/{lectureId}/studies', [VideolinkController::class, 'list']);

// 受講申請関連
Route::resource('/application_of_lectures', ApplicationOfLectureController::class)->except(['create', 'edit']);
Route::get('/{userId}/application_of_lectures', [ApplicationOfLectureController::class, 'list']);
Route::get('/{userId}/applybox', [ApplyboxController::class, 'list']);
