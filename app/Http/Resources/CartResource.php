<?php

namespace App\Http\Resources;

use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

class CartResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @return array<string, mixed>
     */
    public function toArray(Request $request): array
    {
        return
        [
            'id' => $this->id,
            'buyer' => $this->buyer?->name,
            'product' => $this->product?->name,
            'qty' => $this->qty,
            'status' => $this->status,
            'price' => $this->price,
            'price_total' => $this->price_total,
            'checkout' => $this->checkout
        ];
    }
}
