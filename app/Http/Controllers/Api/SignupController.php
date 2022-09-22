<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class SignupController extends Controller
{
    public function signup(Request $request)
    {
        $user = new \App\Models\User;
        $user->login_id = $request->input('login_id');
        $user->password = bcrypt($request->input('password'));
        $user->user_name = $request->input('user_name');
        $user->email = $request->input('email');
        $user->save();

        return response()->json($user);
    }

    public function signin(Request $request)
    {
        $user = \App\Models\User::where('login_id', $request->input('username'))->get();
        if ($user->count() == 1) {
            if (Hash::check($request->input('password'), $user[0]->password)) {
                return response()->json([
                    'message' => 'success',
                    'data' => $user[0],
                ], 200);
            } else {
                return response()->json([
                    'message' => 'signin failed.',
                    'data' => array()
                ], 400);
            }
        } else {
            return response()->json([
                'message' => 'signin failed.',
                'data' => array()
            ], 400);
        }
    }
}
