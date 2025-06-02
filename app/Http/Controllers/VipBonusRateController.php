<?php

namespace App\Http\Controllers;

use App\Http\Controllers\BonusCalculateInterface\BonusCalculationService;

class VipBonusRateController implements BonusCalculationService
{
    /**
     * @param $bonus
     * @param $data
     * @return array
     */
    public function apply($bonus, $data): array
    {
        if ($data['status'] === 'vip') {
            $currentBonus = $bonus * 0.4;
            return [$currentBonus + $bonus, $bonus];
        }
        return [$bonus, 0];
    }

    public function getName()
    {
        return 'vip_boost';
    }

}
