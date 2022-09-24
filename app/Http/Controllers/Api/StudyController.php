<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class StudyController extends Controller
{
    /**
     * @param \Illuminate\Http\Request $request
     * @return \Illuminate\Http\Response
     */
    public function list(Request $request, int $userId)
    {
        // ①自分が生徒であるリストを取得
        $students = collect(\App\Models\student::where('user_id', $userId)->get());
        // ②生徒リストから対象講義を割り出す(keyby & keysで重複した講義IDは1にまとめる)
        $lectureIds = $students->keyby('lecture_id')->keys();
        $lectures = [];
        foreach ($lectureIds as $id) {
            array_push($lectures, \App\Models\lecture::find($id));
        }
        // ③対象講義に講義オーナー情報を付加する
        $lecturewithusers = [];
        foreach ($lectures as $lecture) {
            $obj = [
                'lecture' => \App\Models\lecture::find($lecture->id),
                'user' => $lecture->user
            ];
            array_push($lecturewithusers, $obj);
        }

        return response()->json([
            'message' => 'success',
            'data' => $lecturewithusers
        ], 200);
    }
}
