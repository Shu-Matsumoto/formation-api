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
        // ①自分がオーナーとなっている講義リストを取得
        $ownerLectureList = \App\Models\lecture::where('user_id', $userId)->get();
        // ②該当講義に割り当てされている受講生リストを取得
        $studentPosts = [];
        foreach ($ownerLectureList as $lecture) {
            $posts = $lecture->students;
            foreach ($posts as $post) {
                array_push($studentPosts, $post);
            }
        }
        // ③受講申請テーブルの中から受講生IDが一致するリストを取得
        $allApplys = [];
        foreach ($studentPosts as $studentPost) {
            $applys = $studentPost->application_of_lectures;
            foreach ($applys as $apply) {
                // 同時にユーザー、募集生徒、講義情報を付加する。
                $apply->user;
                // lecture情報を付加するためにstudent情報が必要なため
                // 呼び出しすると一緒にstudent情報が付加される。
                // なので$apply->studentは敢えて呼び出さなくてOK
                $apply->lecture;
                array_push($allApplys, $apply);
            }
        }

        return response()->json([
            'message' => 'success',
            'data' => collect($allApplys),
        ], 200);
    }
}
