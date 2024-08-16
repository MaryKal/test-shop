<?php

namespace App\Observers;

use App\Models\BasketProduct;

class BasketProductObserver
{

    /**
     * Handle the BasketProduct "created" event.
     */
    public function created(BasketProduct $basketProduct): void
    {
        $basketProduct->basket->countTotal();

    }

    public function creating(BasketProduct $basketProduct): void
    {
        $basketProduct->countTotal();
    }


    /**
     * Handle the BasketProduct "deleted" event.
     */
    public function deleted(BasketProduct $basketProduct): void
    {
        $basketProduct->basket->countTotal();
    }

}
