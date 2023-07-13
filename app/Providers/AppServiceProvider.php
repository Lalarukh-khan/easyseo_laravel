<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use Laravel\Paddle\Cashier;
use Laravel\Paddle\Receipt;
use Laravel\Paddle\Subscription;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     *
     * @return void
     */
    public function register()
    {
        Cashier::ignoreMigrations();
    }

    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot()
    {
        Cashier::useSubscriptionModel(Subscription::class);
        Cashier::useReceiptModel(Receipt::class);
    }
}
