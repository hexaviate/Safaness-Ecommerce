<?php

namespace App\Http\Controllers\Api;

use App\Http\Resources\CartResource;
use App\Http\Resources\ProductResource;
use App\Models\Cart;
use App\Models\Product;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class CartController
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $user = auth('sanctum')->user();
        if ($user == null) {
            return response()->json([
                'status' => 'unauthenticated',
                'message' => "You must be logged in"
            ], 401);
        }

        if ($user->getTable() == 'buyers') {
            $cart = Cart::with('product', 'buyer')->get();
            $data = CartResource::collection($cart);
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
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $user = auth('sanctum')->user();
        if ($user == null) {
            return response()->json([
                'status' => 'unauthenticated',
                'message' => "You must be logged in"
            ], 401);
        }

        if ($user->getTable() == 'buyers') {


            $validate = Validator::make($request->all(), [
                "product_id" => "required|exists:products,id",
                "qty" => "required|numeric",
            ]);

            if ($validate->fails()) {
                return response()->json([
                    'status' => 'invalid',
                    'message' => $validate->errors()
                ], 400);
            }


            $price = Product::where('id', $request->product_id)->first()->price;
            $qty = $request->qty;

            $total = $price * $qty;


            $user = auth('sanctum')->user()->id;
            $data = $validate->validated();
            $data['buyer_id'] = $user;
            $data['price'] = $price;
            $data['price_total'] = $total;
            $create = Cart::create($data);

            return response()->json([
                'status' => 'success',
                'message' => 'data created',
                'data' => $create
            ], 201);

        } else {
            return response()->json([
                'status' => 'forbidden',
                'message' => "You're not logged In"
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
                'status' => 'unauthenticated',
                'message' => "You must be logged in"
            ], 401);
        }

        if ($user->getTable() == 'buyers') {

            $data = Cart::find($id);
            if (!$data) {
                return response()->json([
                    'status' => "not-found",
                    'message' => "Cart not found"
                ], 404);
            } else {

                $validate = Validator::make($request->all(), [
                    "qty" => "required|numeric",
                    "status" => "required|boolean"
                ]);

                if ($validate->fails()) {
                    return response()->json([
                        'status' => 'invalid',
                        'message' => $validate->errors()
                    ], 400);
                }

                $data->update($validate->validated());
                return response()->json([
                    'status' => 'success',
                    'message' => 'data updated',
                    'data' => $data
                ], 201);

            }

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
        if ($user == null) {
            return response()->json([
                'status' => 'unauthenticated',
                'message' => "You must be logged in"
            ], 401);
        }

        if ($user->getTable() == 'buyers') {

            $data = Cart::find($id);
            if (!$data) {
                return response()->json([
                    'status' => "not-found",
                    'message' => "Cart not found"
                ], 404);
            } else {
                $data->delete();

                return response()->json([], 204);
            }

        } else {
            return response()->json([
                'status' => 'forbidden',
                'message' => "You're not an administrator"
            ], 403);
        }
    }
}
