<?php

namespace App\Policies;

use App\Models\BasketProduct;
use App\Models\User;

class BasketProductPolicy
{
    /**
     * Determine whether the user can delete the model.
     */
    public function delete(User $user, BasketProduct $basketProduct): bool
    {
        return $user->basket->id === $basketProduct->basket_id;
    }

}
