<?php

namespace App\Http\Controllers\Api\Auth;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class AuthAdminController
{
    public function signIn(Request $request)
    {
        $credential = [
            'name' => $request->name,
            'password' => $request->password
        ];

        if(auth('web')->attempt($credential)){
            $user = User::where('name', $request->name)->first();
            $token = $user->createToken('auth_login')->plainTextToken;

            return response()->json([
                "status" => 'success',
                "token" => $token
            ],200);
        } else {
            return response()->json([
                "status" => 'invalid',
                "message" => 'Invalid name or password'
            ], 401);
        }
    }

    public function logOut($id){

    }
}
