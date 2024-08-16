<?php

namespace App\Providers;

use App\Models\BasketProduct;
use App\Observers\BasketProductObserver;
use Illuminate\Support\ServiceProvider;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     */
    public function register(): void
    {
        //
    }

    /**
     * Bootstrap any application services.
     */
    public function boot(): void
    {
        BasketProduct::observe(BasketProductObserver::class);
    }
}
