<?php

namespace App\Http\Controllers;

use App\Http\Resources\BasketResource;

class BasketController extends Controller
{
    public function __invoke()
    {
        return BasketResource::make(
            auth()
                ->user()
                ->basket
                ->load('products')
        );
    }
}
