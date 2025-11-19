<?php

namespace App\Http\Resources;

use App\Models\Courier;
use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

class TransactionResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @return array<string, mixed>
     */
    public function toArray(Request $request): array
    {
        return [
            "id" => $this->id,
            "buyerId" => $this->buyer_id,
            "status" => $this->status,
            "information" => $this->information,
            "subtotal" => $this->subtotal,
            "ongkir" => $this->shipping_cost,
            "biaya_layanan" => 1000,
            "total" => $this->payment_total,
            "orderedAt" => $this->created_at,
            "transaction_details" => TransactionDetailResource::collection($this->transactionDetail),
            "courier_info" => CourierResource::collection($this->couriers),
        ];
    }
}
