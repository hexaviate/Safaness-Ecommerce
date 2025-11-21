<?php

namespace App\Http\Controllers\Api;

use App\Http\Resources\AdressResource;
use App\Models\Adress;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class AdressController
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $user = auth('sanctum')->user();
        if (!$user) {
            return response()->json([
                "status" => "error",
                "message" => "anda harus login terlebih dahulu"
            ], 401);
        }

        $adress = Adress::where('buyer_id', $user->id)->get();

        return response()->json([
            "status" => "success",
            "data" => AdressResource::collection($adress)
        ]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $user = auth('sanctum')->user();
        if (!$user) {
            return response()->json([
                "status" => "error",
                "message" => "anda harus login terlebih dahulu"
            ], 401);
        }

        $validate = Validator::make($request->all(), [
            "adress" => "required",
            "zipcode" => "required"
        ]);

        if ($validate->fails()) {
            return response()->json([
                'status' => 'invalid',
                'message' => $validate->errors()
            ], 400);
        }

        $adress = Adress::create([
            "buyer_id" => $user->id,
            "adress" => $request->adress,
            "zipcode" => $request->zipcode
        ]);

        return response()->json([
            "status" => "success",
            // "data" => AdressResource::collection($adress)
            "data" => $adress
        ]);
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }

    public function showAdress(Request $request)
    {
        $user = auth('sanctum')->user();
        if (!$user) {
            return response()->json([
                "status" => "error",
                "message" => "anda harus login terlebih dahulu"
            ], 401);
        }

        $data = Adress::where('buyer_id', $user->id)->where('id', $request->id)->first();
        // dd($request->id);

        return response()->json([
            "status" => "success",
            "data" => new AdressResource($data)
        ]);
    }
}
