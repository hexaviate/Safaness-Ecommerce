<?php

namespace App\Http\Controllers\Api;

use Illuminate\Http\Request;

class AccountController
{
    public function accountDetail()
    {
        $user = auth('sanctum')->user();
        if ($user == null) {
            return response()->json([
                'status' => 'unauthenticated',
                'message' => "You must be logged in"
            ], 200);
        }

        if ($user->getTable() == 'buyers') {

            $data = [
                "name" => $user->username,
                "phone" => $user->phone,
                "address" => $user->address,
                "zipcode" => $user->zip_code,
            ];

            return response()->json([
                "status" => "success",
                "data" => $data
            ], 200);

        } else {
            return response()->json([
                'status' => 'forbidden',
                'message' => "You're not an administrator"
            ], 403);
        }
    }
}
