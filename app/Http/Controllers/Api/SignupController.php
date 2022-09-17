<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

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
}
