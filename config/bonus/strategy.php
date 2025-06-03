<?php

use app\Http\Controllers\Bonus\BonusDefaultRateController;
use app\Http\Controllers\Bonus\HolidayBonusRateController;
use app\Http\Controllers\Bonus\VipBonusRateController;

return [
    'strategies' => [
        BonusDefaultRateController::class,
        HolidayBonusRateController::class,
        VipBonusRateController::class,
    ],
];
