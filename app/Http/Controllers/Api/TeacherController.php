<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class TeacherController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $teachers = \App\Models\teacher::all();
        return response()->json([
            'message' => 'success',
            'data' => $teachers,
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
        $teacher = \App\Models\teacher::create($request->all());
        return response()->json([
            'message' => 'success',
            'data' => $teacher,
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
        $teacher = \App\Models\teacher::find($id);
        return response()->json([
            'message' => 'success',
            'data' => $teacher,
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
        $teacher = \App\Models\teacher::find($id);
        $teacher->update($request->all());
        $teacher->save();
        return response()->json([
            'message' => 'success',
            'data' => $teacher,
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
        $teacher = \App\Models\teacher::find($id);
        $teacher->delete();
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
        $teachers = \App\Models\teacher::where('user_id', $userId)->get();
        return response()->json($teachers);
    }
}
