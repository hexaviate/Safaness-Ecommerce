<?php

namespace App\Http\Controllers\Api;

use App\Http\Resources\BuyerResource;
use App\Models\Buyer;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class BuyerController extends Controller
{
    public function listBuyer()
    {
        $user = auth('sanctum')->user();
        if ($user == null) {
            return response()->json([
                'status' => 'forbidden',
                'message' => "You're not an administrator"
            ], 403);
        }

        if ($user->getTable() == 'users') {
            $buyer = Buyer::all();
            $data = BuyerResource::collection($buyer);
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

    public function updateBuyer(Request $request, $id)
    {
        $user = auth('sanctum')->user();
        if ($user == null) {
            return response()->json([
                'status' => 'forbidden',
                'message' => "You're not an administrator"
            ], 403);
        }

        //* if User is an Admin
        if ($user->getTable() == 'users') {

            $target = Buyer::where('id', $id)->first();

            //*IF The target is null
            if ($target == null) {
                return response()->json([
                    'status' => "not-found",
                    'message' => "Buyer not found"
                ], 404);
            }

            $validate = Validator::make($request->all(), [
                'name' => 'sometimes|unique:buyers|max:40',
                'password' => 'sometimes|min:5',
                'phone' => 'sometimes|integer',
                'address' => 'sometimes'
            ]);

            //* if validator error
            if ($validate->fails()) {
                return response()->json([
                    'status' => 'invalid',
                    'message' => $validate->errors()
                ], 400);
            }

            $target->update($request->all());

            return response()->json([
                'status' => 'success',
                'message' => 'data updated',
                'data' => $target
            ], 201);


        } else {

        }
    }

    // public function
}
