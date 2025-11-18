<?php

namespace App\Http\Controllers\Api;

use App\Http\Resources\TransactionResource;
use App\Models\Cart;
use App\Models\Transaction;
use GuzzleHttp\Client;
use Illuminate\Http\Request;

class PageCartContorller
{

    public function infoCart()
    {
        $user = auth('sanctum')->user();

        $zipcode = $user->zip_code;
        $cart = Cart::where('buyer_id', $user->id)->where('status', 1)->where('checkout', 'belum')->get();
        $total_weight = $cart->sum('product_weight');
        // dd($cart);
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
        $final = $ongkir + $total;

        $data = [
            "name" => $user->username,
            "phone" => $user->phone,
            "email" => $user->email,
            "address" => $user->address,
            "zipcode" => $zipcode,
            "subtotal" => $total,
            "ongkir" => $ongkir,
            "total" => $final
        ];

        return response()->json([
            "message" => "success",
            "data" => $data
        ], 200);

    }

    public function transactionInfo()
    {
        $user = auth('sanctum')->user();

        $transaction = Transaction::with(['transactionDetail.cart'], 'courier')->where('buyer_id', $user->id)->latest()->get();
        $collection = TransactionResource::collection($transaction);

        return response()->json([
            "message" => "success",
            "data" => $collection
        ], 200);

    }
}
