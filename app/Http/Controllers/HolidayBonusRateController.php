<?php

namespace App\Http\Controllers;

use App\Http\Controllers\BonusCalculateInterface\BonusCalculationService;
use DateTime;

class HolidayBonusRateController implements BonusCalculationService
{
    /**
     * @param int $bonus
     * @param array $data
     * @return array|int[]
     */
    public function apply(int $bonus, array $data): array {
        $date = new DateTime($data['timestamp']);
        $isWeekend = in_array($date->format('N'), [6, 7]);
        $isHoliday = in_array($date->format('Y-m-d'), config('bonus_rule.holidays'));
        if ($isWeekend || $isHoliday) {
            $currentBonus = $bonus;
            return [$bonus * 2, $currentBonus];
        }

        return [$bonus, 0];
    }

    /**
     * @return string
     */
    public function getName(): string
    {
        return 'holiday_bonus';
    }
}
