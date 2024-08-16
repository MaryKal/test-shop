<?php

use App\Http\Controllers\AuthController;
use App\Http\Controllers\BasketController;
use App\Http\Controllers\BasketProductController;
use App\Http\Controllers\ProductController;
use Illuminate\Support\Facades\Route;

Route::post('/login', [AuthController::class, 'login'])->name('login');
Route::get('/products', ProductController::class);

Route::middleware(['auth:sanctum'])
    ->group(function () {
        Route::get('/baskets', BasketController::class);
        Route::resource('/basket-products', BasketProductController::class)->only('store', 'destroy');
//        Route::post('/add-products/{product:code}', [BasketProductController::class, 'store']);
//        Route::delete('/basket-products/{basketProduct}', [BasketProductController::class, 'destroy']);
    });
