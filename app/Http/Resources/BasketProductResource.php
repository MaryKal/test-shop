<?php

namespace App\Http\Resources;

use App\Models\BasketProduct;
use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

/** @mixin BasketProduct */
class BasketProductResource extends JsonResource
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
            'product' => ProductResource::make($this->whenLoaded('product'))
        ];
    }
}
