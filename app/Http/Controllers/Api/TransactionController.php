<?php

namespace App\Http\Controllers\Api;

use App\Models\Cart;
use App\Models\Transaction;
use App\Models\TransactionDetail;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class TransactionController
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
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
                'status' => 'unauthenticated',
                'message' => "You must be logged in"
            ], 401);
        }

        if ($user->getTable() == 'buyers') {

            //* Create Data Di Transaksi
            $validate = Validator::make($request->all(), [
                "status" => "",
                "information" => "",
            ]);

            if ($validate->fails()) {
                return response()->json([
                    'status' => 'invalid',
                    'message' => $validate->errors()
                ], 400);
            }
            $cart = Cart::where('buyer_id', $user->id)->where('status', 1)->where('checkout', 'belum')->get();


            $data = $validate->validated();
            $data['payment_total'] = $cart->sum('price_total');
            $data['buyer_id'] = $user->id;
            $transaction = Transaction::create($data);
            //* end create Transaksi

            //* Create Transaction Detail

            foreach ($cart as $data) {
                TransactionDetail::create([
                    "transaction_id" => $transaction->id,
                    "cart_id" => $data->id
                ]);


                $data->update([
                    "status" => 0,
                    "checkout" => "sudah"
                ]);

            }


            return response()->json([
                'status' => 'success',
                'message' => 'data created',
                'transaction' => $transaction
            ], 201);

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
                'status' => 'unauthenticated',
                'message' => "You must be logged in"
            ], 401);
        }

        if ($user->getTable() == 'users') {

            $data = Transaction::find($id);
            if (!$data) {
                return response()->json([
                    'status' => "not-found",
                    'message' => "Cart not found"
                ], 404);
            } else {

                $validate = Validator::make($request->all(), [
                    "status" => "required",
                    "information" => "required"
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
        //
    }
}
