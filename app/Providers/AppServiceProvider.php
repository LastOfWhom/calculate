<?php

namespace App\Providers;

use app\Http\Controllers\Bonus\BonusDefaultRateController;
use app\Http\Controllers\Bonus\HolidayBonusRateController;
use app\Http\Controllers\Bonus\VipBonusRateController;
use app\Http\Services\Bonus\BonusCalculationService;
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
                new HolidayBonusRateController(),
                new VipBonusRateController()
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
