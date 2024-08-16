<?php

namespace Database\Seeders;

use App\Enums\DiscountTypeEnum;
use App\Models\Offer;
use App\Models\Product;
use Illuminate\Database\Seeder;

class OfferSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $offers = [
            [
                'name' => 'Red Widget discount',
                'description' => 'Buy one red widget, get the second half price',
                'product_id' => Product::where('code', 'R01')->first('id')->id,
                'discount_type' => DiscountTypeEnum::PERCENT,
                'amount' => 0.5,
            ],
        ];

        collect($offers)->each(fn ($offer) => Offer::create($offer));
    }
}
