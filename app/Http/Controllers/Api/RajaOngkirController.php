<?php

namespace App\Http\Controllers\Api;

use App\Models\Transaction;
use GuzzleHttp\Client;
use GuzzleHttp\Exception\RequestException;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;

class RajaOngkirController
{
    // cari alamat tujuan pengiriman
    public function searchDestination(Request $request)
    {
        $response = Http::withHeaders([
            'key' => config('rajaongkir.api_key')
        ])->get('https://rajaongkir.komerce.id/api/v1/destination/domestic-destination', [
                    "search" => $request->search,
                    "limit" => 10,
                    "offset" => 0
                ]);

        return response()->json($response['data']);
    }

    public function checkWaybill(Request $request, string $id)
    {
        $user = auth('sanctum')->user();
        $transaction = Transaction::where('id', $id)->first();


        if ($transaction->buyer_id != $user->id) {
            return response()->json([
                "status" => "error",
                "message" => "Bukan transaksi anda"
            ], 404);
        }


        $lastFive = substr($user->phone, -5);

        // dd($transaction);
        $client = new Client();

        try {
            $res = $client->request('POST', 'https://rajaongkir.komerce.id/api/v1/track/waybill', [
                'headers' => [
                    "key" => '8b46a5daf002a832393957ef35b2cfdc'
                ],
                'query' => [
                    'awb' => $transaction->waybill_number ?? '12341',
                    'courier' => $transaction->courier,
                    'last_phone_number' => $lastFive
                ],
            ]);

            $result = json_decode($res->getbody(), true);


            return response()->json([
                "status" => "success",
                "data" => $result
            ], 200);

        } catch (RequestException $e) {
            // Jika API mengembalikan error response (contoh 404)
            if ($e->hasResponse()) {
                $errorResponse = json_decode($e->getResponse()->getBody(), true);

                return response()->json([
                    "status" => "error",
                    "data" => $errorResponse
                ], $e->getResponse()->getStatusCode());
            }
        }



    }
}
