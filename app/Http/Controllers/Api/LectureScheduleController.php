<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class LectureScheduleController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $lectrues = \App\Models\lecture_schedule::all();
        return response()->json([
            'message' => 'success',
            'data' => $lectrues,
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
        $lectrueSchedules = \App\Models\lecture_schedule::create($request->all());
        return response()->json([
            'message' => 'success',
            'data' => $lectrueSchedules,
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
        $lectrueSchedule = \App\Models\lecture_schedule::find($id);
        return response()->json([
            'message' => 'success',
            'data' => $lectrueSchedule,
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
        $lectrueSchedule = \App\Models\lecture_schedule::find($id);
        $lectrueSchedule->update($request->all());
        $lectrueSchedule->save();
        return response()->json([
            'message' => 'success',
            'data' => $lectrueSchedule,
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
        $lectrueSchedule = \App\Models\lecture_schedule::find($id);
        $lectrueSchedule->delete();
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
        $lectrueSchedules = \App\Models\lecture_schedule::where('user_id', $userId)->get();
        return response()->json($lectrueSchedules);
    }
}
