<?php

namespace App\Http\Controllers\Api;

use App\Models\Cart;
use App\Models\Courier;
use App\Models\Transaction;
use App\Models\TransactionDetail;
use GuzzleHttp\Client;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;
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
                // "courier" => "required",
            ]);

            if ($validate->fails()) {
                return response()->json([
                    'status' => 'invalid',
                    'message' => $validate->errors()
                ], 400);
            }
            $zipcode = $user->zip_code;
            // dd($zipcode);

            $cart = Cart::where('buyer_id', $user->id)->where('status', 1)->where('checkout', 'belum')->get();
            $total_weight = $cart->sum('product_weight');

            if ($cart->isEmpty()) {
                return response()->json([
                    'status' => 'error',
                    'message' => 'Your cart is empty. Please add items before checking out.'
                ], 400);
            }

            // $response = Http::withHeaders([
            //     'key' => config('rajaongkir.api_key')
            // ])->get('https://rajaongkir.komerce.id/api/v1/calculate/domestic-cost', [
            //             "origin" => '59154',
            //             "destination" => $zipcode,
            //             "offset" => 0
            //         ]);

            // dd($response);

            $client = new Client();
            $res = $client->request('POST', 'https://rajaongkir.komerce.id/api/v1/calculate/domestic-cost', [
                'headers' => [
                    "key" => '8b46a5daf002a832393957ef35b2cfdc'
                ],
                'query' => [
                    'origin' => '59154',
                    'destination' => $zipcode,
                    'weight' => $total_weight,
                    'courier' => 'jnt'
                ],
            ]);


            $result = json_decode($res->getbody(), true);
            $ongkir = $result['data']['0']['cost'];
            $total = $cart->sum('price_total');

            // dd($res->getBody()->getContents()->data[0]->cost);

            //ambil cost ongkir
            // print_r($result['data'][0]['cost']);
            // foreach ($result as $item) {
            //     echo($item[0]);
            // }



            $data = $validate->validated();
            $data['subtotal'] = $total;
            $data['shipping_cost'] = $ongkir;
            $data['payment_total'] = $total + $ongkir;
            $data['buyer_id'] = $user->id;
            $transaction = Transaction::create($data);

            $courier = [
                "transaction_id" => $transaction->id,
                "name" => $result['data']['0']['name'],
                "service" => $result['data']['0']['service'],
                "description" => $result['data']['0']['description'],
                "cost" => $result['data']['0']['cost'],
                "etd" => $result['data']['0']['etd'],
            ];

            $createCourier = Courier::create($courier);
            // dd($createCourier);
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
        $user = auth('sanctum')->user();
        if (!$user) {
            return response()->json([
                'status' => 'unauthenticated',
                'message' => "You must be logged in"
            ], 401);
        }

        if ($user->getTable() != "buyers") {
            return response()->json([
                'status' => 'unauthenticated',
                'message' => "You must be buyer"
            ], 401);
        }

        $data = Transaction::find($id);


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
