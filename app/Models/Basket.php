<?php

namespace App\Models;

use App\Casts\MoneyValueCast;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Basket extends Model
{
    /**
     * @var string[]
     */
    protected $guarded = ['id'];

    /**
     * @return BelongsTo
     */
    public function user(): BelongsTo
    {
        return $this->belongsTo(User::class);
    }

    public function countTotal()
    {
        //calculate total price sum(products) + delivery
        $totalItemsSum = $this->products()->sum('total') / 100;

        //count delivery base on condition
        $totalDelivery = match (true) {
            $totalItemsSum >= 90 => 0.0,
            $totalItemsSum >= 50 => 2.95,
            default => 4.95
        };

        $this->updateQuietly(['total' => round($totalItemsSum + $totalDelivery, 2)]);
    }

    /**
     * @return HasMany
     */
    public function products(): HasMany
    {
        return $this->hasMany(BasketProduct::class);
    }

    /**
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
