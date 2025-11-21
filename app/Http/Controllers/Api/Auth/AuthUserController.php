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
            'username' => $request->username,
            'password' => $request->password
        ];

        if (auth('buyer')->attempt($credential)) {
            if (auth('buyer')->attempt($credential)) {
                $buyer = Buyer::where('username', $request->username)->first();
                $token = $buyer->createToken('auth_login')->plainTextToken;

                return response()->json([
                    'status' => 'success',
                    'token' => $token
                ], 200);
            } else {
                return response()->json([
                    "status" => 'invalid',
                    "message" => 'Invalid name or password'
                ], 401);
            }
        }
    }

    public function signUp(Request $request)
    {
        $validate = Validator::make($request->all(), [
            'name' => 'required|max:40',
            'username' => 'required|unique:buyers|max:40',
            'email' => 'required|unique:buyers',
            'password' => 'required|min:5',
            'phone' => 'required',
        ]);

        if ($validate->fails()) {
            return response()->json([
                'status' => 'invalid',
                'message' => $validate->errors()
            ], 400);
        }

        $buyer = Buyer::create([
            'name' => $request->name,
            'username' => $request->username,
            'email' => $request->email,
            'password' => $request->password,
            'phone' => $request->phone,
        ]);

        $token = $buyer->createToken('auth_login')->plainTextToken;

        return response()->json([
            'status' => 'success',
            'token' => $token
        ], 201);
    }

    public function logout()
    {
        $user = auth('sanctum')->user();

        if (!$user) {
            return response()->json([
                "message" => 'Invalid token'
            ], 401);
        }

        $user->currentAccessToken()->delete();
        return response()->json([
            'status' => 'success',
            'message' => 'Logout success'
        ], 200);
    }
}
