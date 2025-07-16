<?php

namespace App\Providers;

use App\Models\WasteDeposit;
use Illuminate\Support\ServiceProvider;
use App\Observers\WasteDepositObserver;

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
        WasteDeposit::observe(WasteDepositObserver::class);
    }
}
