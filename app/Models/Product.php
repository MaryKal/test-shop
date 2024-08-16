<?php

namespace App\Models;

use App\Casts\MoneyValueCast;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasOne;

class Product extends Model
{
    /**
     * @var string[]
     */
    protected $guarded = ['id'];

    public function offer(): HasOne
    {
        return $this->hasOne(Offer::class);
    }

    /**
     * Get the attributes that should be cast.
     *
     * @return array<string, string>
     */
    protected function casts(): array
    {
        return [
            'price' => MoneyValueCast::class,
        ];
    }
}
