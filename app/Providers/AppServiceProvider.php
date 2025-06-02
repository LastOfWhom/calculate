<?php

namespace App\Providers;

use App\Http\Controllers\BonusDefaultRateController;
use App\Http\Controllers\HolidayBonusRateController;
use App\Http\Controllers\VipBonusRateController;
use App\Http\Services\BonusCalculationService;
use Illuminate\Support\ServiceProvider;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     */
    public function register()
    {
        $this->app->bind(BonusCalculationService::class, function ($app) {
            return new BonusCalculationService([
                new BonusDefaultRateController(),
                new VipBonusRateController(),
                new HolidayBonusRateController(),
            ]);
        });
    }

    /**
     * Bootstrap any application services.
     */
    public function boot(): void
    {
        //
    }
}
