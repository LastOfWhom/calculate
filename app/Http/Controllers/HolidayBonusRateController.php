<?php

namespace App\Http\Controllers;

use App\Http\Controllers\BonusCalculateInterface\BonusCalculationService;

class HolidayBonusRateController implements BonusCalculationService
{
    public function apply( $currentBonus,  $data): array {
        $date = new \DateTime($data['timestamp']);
        $isWeekend = in_array($date->format('N'), [6, 7]);
        $isHoliday = in_array($date->format('Y-m-d'), config('bonus_rule.holidays'));
        if ($isWeekend || $isHoliday) {
            $bonus = $currentBonus;
            return [$currentBonus * 2, $bonus];
        }

        return [$currentBonus, 0];
    }


    public function getName()
    {
        return 'holiday_bonus';
    }
}
