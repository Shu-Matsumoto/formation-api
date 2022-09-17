<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class TeamChatController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $chats = \App\Models\team_chat::all();
        return response()->json([
            'message' => 'success',
            'data' => $chats,
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
        $chat = \App\Models\team_chat::create($request->all());
        return response()->json([
            'message' => 'success',
            'data' => $chat,
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
        $chat = \App\Models\team_chat::find($id);
        return response()->json([
            'message' => 'success',
            'data' => $chat,
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
        $chat = \App\Models\team_chat::find($id);
        $chat->update($request->all());
        $chat->save();
        return response()->json([
            'message' => 'success',
            'data' => $chat,
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
        $chat = \App\Models\team_chat::find($id);
        $chat->delete();
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
        $chats = \App\Models\team_chat::where('user_id', $userId)->get();
        return response()->json($chats);
    }
}
