<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreBasketProductRequest;
use App\Http\Resources\BasketResource;
use App\Models\BasketProduct;
use App\Models\Product;
use Illuminate\Support\Facades\Gate;

class BasketProductController extends Controller
{

    /**
     * @param StoreBasketProductRequest $request
     * @return BasketResource
     */
    public function store(StoreBasketProductRequest $request): BasketResource
    {

        $product = Product::where('code', $request->validated())->first();

        $basket = auth()->user()->basket;

        $basket
            ->products()
            ->create([
                'product_id' => $product->id,
                'total' => $product->price
            ]);

        return BasketResource::make($basket->refresh()->load('products.product:id,name'));

    }

    /**
     * @param BasketProduct $basketProduct
     * @return BasketResource
     */
    public function destroy(BasketProduct $basketProduct): BasketResource
    {

        Gate::authorize('delete', $basketProduct);

        $basketProduct->delete();

        return BasketResource::make($basketProduct->basket->load('products.product:id,name'));
    }
}
