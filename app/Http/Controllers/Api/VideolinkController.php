<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class VideolinkController extends Controller
{
    /**
     * @param \Illuminate\Http\Request $request
     * @return \Illuminate\Http\Response
     */
    public function list(Request $request, int $lectureId)
    {
        $schedules = \App\Models\lecture_schedule::where('lecture_id', $lectureId)->get();
        return response()->json($schedules);
    }
}
