<?php

namespace App\Http\Controllers\Api;

use App\Http\Resources\ProductResource;
use App\Models\Product;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Str;

class ProductController
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $user = auth('sanctum')->user();
        if ($user == null) {
            return response()->json([
                'status' => 'forbidden',
                'message' => "You're not an administrator"
            ], 403);
        }

        if ($user->getTable() == 'users') {
            $product = Product::with('sub_category')->get();
            $data = ProductResource::collection($product);
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

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {

    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $user = auth('sanctum')->user();
        if ($user == null) {
            return response()->json([
                'status' => 'forbidden',
                'message' => "You're not an administrator"
            ], 403);
        }

        if ($user->getTable() == 'users') {

            $validate = Validator::make($request->all(), [
                'name' => 'required',
                'description' => 'required',
                'price'=> 'required|decimal:2',
                'stock' => 'required|numeric',
                'sub_categories_id' => 'required|exists:categories,id'
            ]);

            if ($validate->fails()) {
                return response()->json([
                    'status' => 'invalid',
                    'message' => $validate->errors()
                ], 400);
            }

            $data = Product::create($validate->validated());

            return response()->json([
                'status' => 'success',
                'message' => 'category created',
                'data' => $data
            ], 200);

        } else {
            return response()->json([
                'status' => 'forbidden',
                'message' => "You're not an administrator"
            ], 403);
        }
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
        $user = auth('sanctum')->user();
        if ($user == null) {
            return response()->json([
                'status' => 'forbidden',
                'message' => "You're not an administrator"
            ], 403);
        }

        if ($user->getTable() == 'users') {

            $target = Product::find($id);
            if ($target == null) {
                return response()->json([
                    'status' => "not-found",
                    'message' => "Category not found"
                ], 404);
            }

            $validate = Validator::make($request->all(), [
                'name' => 'required',
                'description' => 'required',
                'price'=> 'required|decimal:2',
                'stock' => 'required|numeric',
                'sub_categories_id' => 'required|exists:categories,id'
            ]);

            if ($validate->fails()) {
                return response()->json([
                    'status' => 'invalid',
                    'message' => $validate->errors()
                ], 400);
            }

            $data = collect($request->only('name', 'description', 'price', 'stock', 'sub_categories_id'))
                ->filter(fn($value) => !is_null($value))
                ->toArray();

                            // ✅ If name is included, also generate slug automatically
            if (isset($data['name'])) {
                $data['slug'] = Str::of($data['name'])->slug('-');
            }

            $target->update($data);

            return response()->json([
                'status' => 'success',
                'message' => 'data updated',
                'data' => $target
            ], 201);

        } else {
            return response()->json([
                'status' => 'forbidden',
                'message' => "You're not an administrator"
            ], 403);
        }
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $user = auth('sanctum')->user();
        if($user == null){
            return response()->json([
                'status' => 'forbidden',
                'message' => "You're not an administrator"
            ], 403);
        }

        if($user->getTable() == 'users')
        {

            $data = Product::find($id);
            if(!$data){
                return response()->json([
                    'status' => "not-found",
                    'message' => "Category not found"
                ], 404);
            } else {
                $data->delete();

                return response()->json([],204);
            }

        } else{
            return response()->json([
                'status' => 'forbidden',
                'message' => "You're not an administrator"
            ], 403);
        }
    }
}
