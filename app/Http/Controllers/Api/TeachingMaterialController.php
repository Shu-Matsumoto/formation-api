<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class TeachingMaterialController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $materials = \App\Models\teaching_material::all();
        return response()->json([
            'message' => 'success',
            'data' => $materials,
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
        $material = \App\Models\teaching_material::create($request->all());
        return response()->json([
            'message' => 'success',
            'data' => $material,
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
        $material = \App\Models\teaching_material::find($id);
        return response()->json([
            'message' => 'success',
            'data' => $material,
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
        $material = \App\Models\teaching_material::find($id);
        $material->update($request->all());
        $material->save();
        return response()->json([
            'message' => 'success',
            'data' => $material,
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
        $material = \App\Models\teaching_material::find($id);
        $material->delete();
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
        $material = \App\Models\teaching_material::where('user_id', $userId)->get();
        return response()->json($material);
    }
}
