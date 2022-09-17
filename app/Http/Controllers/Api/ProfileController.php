<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class ProfileController extends Controller
{
    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $user = \App\Models\User::find($id);
        $profile = [
            'user_name' => $user->user_name,
            'email' => $user->email,
            'self_introduction' => $user->self_introduction,
        ];
        return response()->json([
            'message' => 'success',
            'data' => $profile,
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
        $user = \App\Models\User::find($id)->fill([
            'user_name' => $request->input('user_name'),
            'email' => $request->input('email'),
            'self_introduction' => $request->input('self_introduction'),
        ]);
        $user->save();
        $profile = [
            'user_name' => $user->user_name,
            'email' => $user->email,
            'self_introduction' => $user->self_introduction,
        ];
        return response()->json([
            'message' => 'success',
            'data' => $profile,
        ], 200);
    }
}
