<?php

namespace App\Http\Controllers\Api\Auth;

use App\Models\Buyer;
use Illuminate\Foundation\Http\Middleware\ValidateCsrfToken;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class AuthUserController
{
    public function signIn(Request $request)
    {
        $credential = [
            'name' => $request->name,
            'password' => $request->password
        ];

        if(auth('buyer')->attempt($credential)){
            $buyer = Buyer::where('name', $request->name)->first();
            $token = $buyer->createToken('auth_login')->plainTextToken;

            return response()->json([
                'status' => 'success',
                'token' => $token
            ],200);
        } else {
            return response()->json([
                "status" => 'invalid',
                "message" => 'Invalid name or password'
            ], 401);
        }
    }

    public function signUp(Request $request)
    {
        $validate = Validator::make($request->all(), [
            'name' => 'required|unique:buyers|max:40',
            'password' => 'required|min:5',
            'phone' => 'required|integer',
            'address' => 'required'
        ]);

        if($validate->fails()){
            return response()->json([
                'status' => 'invalid',
                'message' => $validate->errors()
            ], 400);
        }

        $buyer = Buyer::create([
            'name' => $request->name,
            'password' => $request->password,
            'phone' => $request->phone,
            'address' => $request->address
        ]);

        $token = $buyer->createToken('auth_login')->plainTextToken;

        return response()->json([
            'message' => 'success',
            'token' => $token
        ],201);
    }
}
