<?php

namespace App\Http\Resources;

use App\Models\ProductImage;
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
                    "id" => $this->id,
                    "product" => $this->product->name,
                    "qty" => $this->qty,
                    "price" => $this->price,
                    "price_total" => $this->price_total,
                    "product_weight" => $this->product_weight,
                    "image" => ProductImage::where('product_id', $this->product_id)->first()->image
        ];
    }
}
