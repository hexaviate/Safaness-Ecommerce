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
            // $cart = Cart::with('product', 'buyer')->where('buyer_id', $user->id)->get();
            $cart = Cart::with('product', 'buyer')->where('buyer_id', $user->id)->where('status', 1)->where('checkout', 'belum')->get();
            $count = Cart::with('product', 'buyer')->where('buyer_id', $user->id)->where('status', 1)->where('checkout', 'belum')->count();
            $total = $cart->sum('price_total');


            $data = CartResource::collection($cart);

            return response()->json([
                "status" => "success",
                "count" => $count,
                "total" => $total,
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
            $weight = Product::where('id', $request->product_id)->first()->weight;
            $qty = $request->qty;

            $total = $price * $qty;
            $total_weight = $weight * $qty;


            $user = auth('sanctum')->user()->id;
            $data = $validate->validated();
            $data['buyer_id'] = $user;
            $data['price'] = $price;
            $data['price_total'] = $total;
            $data['product_weight'] = $total_weight;
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

            $cart = Cart::find($id);
            if (!$cart) {
                return response()->json([
                    'status' => "not-found",
                    'message' => "Cart not found"
                ], 404);
            } else {

                $validate = Validator::make($request->all(), [
                    "qty" => "required|numeric",
                ]);

                if ($validate->fails()) {
                    return response()->json([
                        'status' => 'invalid',
                        'message' => $validate->errors()
                    ], 400);
                }

                $price = Product::where('id', $cart->product_id)->first()->price;
                $weight = Product::where('id', $cart->product_id)->first()->weight;
                $qty = $request->qty;

                $total = $price * $qty;
                $total_weight = $weight * $qty;


                $user = auth('sanctum')->user()->id;
                $data = $validate->validated();
                $data['buyer_id'] = $user;
                $data['price'] = $price;
                $data['price_total'] = $total;
                $data['product_weight'] = $total_weight;


                $cart->update($data);


                return response()->json([
                    'status' => 'success',
                    'message' => 'data updated',
                    'data' => $data
                ], 201);

            }

        } else {
            return response()->json([
                'status' => 'forbidden',
                'message' => "You're not an buyer"
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
