<?php

namespace App\Http\Controllers;

use App\Http\Controllers\BonusCalculateInterface\BonusCalculationService;

class BonusDefaultRateController implements BonusCalculationService
{
    public function apply($bonus, $data): array
    {
        $currentBonus = floor($bonus / 10);
        return [$currentBonus + $bonus , $currentBonus];
    }

    public function getName()
    {
        return 'base rate';
    }
}
