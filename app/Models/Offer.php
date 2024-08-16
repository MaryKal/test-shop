<?php

namespace App\Models;

use App\Casts\MoneyValueCast;
use App\Enums\DiscountTypeEnum;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Offer extends Model
{
    /**
     * @var string[]
     */
    protected $guarded = ['id'];

    public function product(): BelongsTo
    {
        return $this->belongsTo(Product::class);
    }

    /**
     * @return string[]
     */
    protected function casts(): array
    {
        return [
            'discount_type' => DiscountTypeEnum::class,
            'amount' => MoneyValueCast::class,
        ];
    }
}
