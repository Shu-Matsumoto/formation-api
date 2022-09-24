<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;

class LectureController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $lectrues = \App\Models\lecture::all();
        // ユーザー情報の付加
        $lectruewithusers = [];
        foreach ($lectrues as $lecture) {
            $obj = [
                'lecture' => \App\Models\lecture::find($lecture->id),
                'user' => $lecture->user
            ];
            array_push($lectruewithusers, $obj);
        }

        return response()->json([
            'message' => 'success',
            'data' => collect($lectruewithusers),
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
        $lectrue = \App\Models\lecture::create($request->all());
        return response()->json([
            'message' => 'success',
            'data' => $lectrue,
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
        $lecture = \App\Models\lecture::find($id);
        return response()->json([
            'message' => 'success',
            'data' => $lecture
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
        $lecture = \App\Models\lecture::find($id);
        $lecture->update($request->all());
        $lecture->save();
        return response()->json([
            'message' => 'success',
            'data' => $lecture,
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
        $lecture = \App\Models\lecture::find($id);
        $lecture->delete();
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
        // 講義情報にユーザー情報の付加
        $lecturewithusers = [];
        $lectures = \App\Models\lecture::where('user_id', $userId)->get();
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

    public static function console_log($var)
    {
        echo '<script>console.log(', json_encode($var, JSON_UNESCAPED_UNICODE), ');</script>';
    }

    /**
     * Display the specified resource.(detail ver.)
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function showdetail($id)
    {
        // 講師情報にユーザー情報の付加
        $teacherwithusers = [];
        $teachers = \App\Models\lecture::find($id)->teachers;
        foreach ($teachers as $teacher) {
            $obj = [
                'teacher' => \App\Models\teacher::find($teacher->id),
                'user' => $teacher->user
            ];
            array_push($teacherwithusers, $obj);
        }
        // 生徒情報にユーザー情報の付加
        $studentwithusers = [];
        $students = \App\Models\lecture::find($id)->students;
        foreach ($students as $student) {
            $obj = [
                'student' => \App\Models\student::find($student->id),
                'user' => $student->user
            ];
            array_push($studentwithusers, $obj);
        }

        return response()->json([
            'message' => 'success',
            'data' => [
                'lecture' => \App\Models\lecture::find($id),
                'students' => $studentwithusers,
                'teachers' => $teacherwithusers,
                'schedules' => \App\Models\lecture::find($id)->lecture_schedules,
                'materials' => \App\Models\lecture::find($id)->teaching_materials
            ]
        ], 200);
    }
}
