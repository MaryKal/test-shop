<?php

namespace App\Http\Resources;

use App\Models\Basket;
use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

/** @mixin Basket */
class BasketResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @return array<string, mixed>
     */
    public function toArray(Request $request): array
    {
        return [
            'id' => $this->id,
            'total' => $this->total,
            'basket_products' => BasketProductResource::collection($this->whenLoaded('products'))
        ];
    }
}
