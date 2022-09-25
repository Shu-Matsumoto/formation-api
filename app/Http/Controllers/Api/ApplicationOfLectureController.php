<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class ApplicationOfLectureController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $applications = \App\Models\application_of_lecture::all();
        return response()->json([
            'message' => 'success',
            'data' => $applications,
        ], 200);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $application = \App\Models\application_of_lecture::create($request->all());

        // 新規追加時にユーザーへ通知を発行する
        if ($application->status == 1) {
            $lecture = \App\Models\application_of_lecture::find($application->id)->lecture;
            $owner = \App\Models\user::find($lecture->user_id);
            $sender = \App\Models\user::find($application->user_id);

            $notice = new \App\Models\user_notice;
            $notice->user_id = $owner->id;
            $notice->type = 1;
            $notice->already_read = 1;
            $notice->title = "受講申請受信のお知らせ";
            $notice->sub_title = "受講希望者:" . $sender->user_name . "から受講申請が届きました。" .
                "\n希望者からの申請を処理(許可or却下)してください。" .
                "\n希望者からの受講動機文:" . $application->motivation;
            $notice->save();
        }

        return response()->json([
            'message' => 'success',
            'data' => $application,
        ], 200);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $application = \App\Models\application_of_lecture::find($id);
        $application->user;
        $application->lecture;

        return response()->json([
            'message' => 'success',
            'data' => $application,
        ], 200);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $beforeApplication = \App\Models\application_of_lecture::find($id);
        // 更新はstatusとfb_commentに限定する(利用用途拡張時に開放する)
        \App\Models\application_of_lecture::where('id', $id)
            ->update(
                [
                    'status' => $request->input('status'),
                    'fb_comment' => $request->input('fb_comment')
                ]
            );
        $application = \App\Models\application_of_lecture::find($id);

        // ステータス変化時にユーザーへ通知を発行する
        if (($beforeApplication->status == 1) &&
            (($application->status == 2) || ($application->status == 3))
        ) {
            $lecture = $beforeApplication->lecture;
            $owner = \App\Models\user::find($lecture->user_id);

            $notice = new \App\Models\user_notice;
            $notice->user_id = $application->user_id;
            $notice->type = 1;
            $notice->already_read = 1;
            $result = $application->status == 2 ? "許可" : "却下";
            $notice->title = "受講申請結果のお知らせ";
            $notice->sub_title = "講師:" . $owner->user_name . "から受講申請結果が届きました。" .
                "\n結果:" . $result .
                "\n講師からの返信:" . $application->fb_comment;
            $notice->save();
        }

        return response()->json([
            'message' => 'success',
            'data' => $application,
        ], 200);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $application = \App\Models\application_of_lecture::find($id);
        $application->delete();
        return response()->json([
            'message' => 'success',
        ], 200);
    }

    /**
     * @param \Illuminate\Http\Request $request
     * @return \Illuminate\Http\Response
     */
    public function list(Request $request, int $userId)
    {
        $applications = \App\Models\application_of_lecture::where('user_id', $userId)->get();
        return response()->json($applications);
    }
}
