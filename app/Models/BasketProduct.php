<?php

namespace App\Models;

use App\Casts\MoneyValueCast;
use App\Enums\DiscountTypeEnum;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class BasketProduct extends Model
{
    public array $columns = ['total'];

    /**
     * @var string[]
     */
    protected $guarded = ['id'];

    public function basket(): BelongsTo
    {
        return $this->belongsTo(Basket::class);
    }

    public function product(): BelongsTo
    {
        return $this->belongsTo(Product::class);
    }

    public function countTotal(): void
    {
        //if product has no available offer
        if (! $offer = $this->product->offer) {
            return;
        }

        //current count of products in the basket + 1 incoming product
        $productCount = $this->basket->products->where('product_id', $this->product_id)->count() + 1;

        //product price
        $productPrice = $this->product->price;

        $this->total = $productPrice;

        //if count of products is even or odd
        if ($productCount > 1 && $productCount % 2 === 0) {

            $this->total = match ($offer->discount_type) {
                DiscountTypeEnum::PERCENT => round((float) $productPrice * (float) $offer->amount, 2, PHP_ROUND_HALF_DOWN),
                DiscountTypeEnum::FIXED => round((float) $productPrice - (float) $offer->amount, 2, PHP_ROUND_HALF_DOWN),
                default => $productPrice
            };
        }

    }

    /**-
     * Get the attributes that should be cast.
     *
     * @return array<string, string>
     */
    protected function casts(): array
    {
        return [
            'total' => MoneyValueCast::class,
        ];
    }
}
