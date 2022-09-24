<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class UserNoticeController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $notices = \App\Models\user_notice::all();
        return response()->json([
            'message' => 'success',
            'data' => $notices,
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
        $notice = \App\Models\user_notice::create($request->all());
        return response()->json([
            'message' => 'success',
            'data' => $notice,
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
        $notice = \App\Models\user_notice::find($id);
        return response()->json([
            'message' => 'success',
            'data' => $notice,
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
        \App\Models\user_notice::where('id', $id)
            ->update(
                [
                    'already_read' => $request->input('already_read'),
                ]
            );
        $notice = \App\Models\user_notice::find($id);
        return response()->json([
            'message' => 'success',
            'data' => $notice,
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
        $notice = \App\Models\user_notice::find($id);
        $notice->delete();
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
        $notices = \App\Models\user_notice::where('user_id', $userId)->get();
        return response()->json([
            'message' => 'success',
            'data' => $notices,
        ], 200);
    }
}
