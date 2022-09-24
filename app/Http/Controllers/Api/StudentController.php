<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class StudentController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $students = \App\Models\student::all();
        return response()->json([
            'message' => 'success',
            'data' => $students,
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
        $student = \App\Models\student::create($request->all());
        return response()->json([
            'message' => 'success',
            'data' => $student,
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
        $student = \App\Models\student::find($id);
        return response()->json([
            'message' => 'success',
            'data' => $student,
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
        \App\Models\student::where('id', $id)
            ->update(
                [
                    'user_id' => $request->input('user_id'),
                    'position' => $request->input('position'),
                    'status' => $request->input('status'),
                    'pay_amount' => $request->input('pay_amount'),
                    'goal' => $request->input('goal'),
                    'requirement' => $request->input('requirement'),
                    'dev_env' => $request->input('dev_env')
                ]
            );
        $student = \App\Models\student::find($id);
        return response()->json([
            'message' => 'success',
            'data' => $student,
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
        $student = \App\Models\student::find($id);
        $student->delete();
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
        $students = \App\Models\student::where('user_id', $userId)->get();
        return response()->json($students);
    }
}
