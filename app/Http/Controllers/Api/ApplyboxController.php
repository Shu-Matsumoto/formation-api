<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

/**
 * 受講申請受信ボックス
 */
class ApplyboxController extends Controller
{
    /**
     * @param \Illuminate\Http\Request $request
     * @return \Illuminate\Http\Response
     */
    public function list(Request $request, int $userId)
    {
        // ①自分が講師となっている講義リストを取得
        $iAmTeacherList = \App\Models\teacher::where('user_id', $userId)->get();
        // ②該当講義に割り当てされている受講生リストを取得
        $studentPosts = [];
        foreach ($iAmTeacherList as $teacher) {
            $posts = \App\Models\student::where('lecture_id', $teacher->lecture_id)->get();
            foreach ($posts as $post) {
                array_push($studentPosts, $post);
            }
        }
        // ③受講申請テーブルの中から受講生IDが一致するリストを取得
        $allApplys = [];
        foreach ($studentPosts as $studentPost) {
            $applys = \App\Models\application_of_lecture::where('student_id', $studentPost->id)->get();
            foreach ($applys as $apply) {
                array_push($allApplys, $apply);
            }
        }

        return response()->json($allApplys);
    }
}
