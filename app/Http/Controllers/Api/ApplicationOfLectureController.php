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
        // 更新はstatusとfb_commentに限定する(利用用途拡張時に開放する)
        \App\Models\application_of_lecture::where('id', $id)
            ->update(
                [
                    'status' => $request->input('status'),
                    'fb_comment' => $request->input('fb_comment')
                ]
            );
        $application = \App\Models\application_of_lecture::find($id);
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
