<?php

namespace app\Http\Controllers\Bonus;

use app\Http\Interface\Bonus\BonusCalculateInterface;

class VipBonusRateController implements BonusCalculateInterface
{
    /**
     * @param int $bonus
     * @param array $data
     * @return array
     */
    public function apply(int $bonus, array $data): array
    {
        if ($data['status'] === 'vip') {
            $currentBonus = $bonus * 0.4;
            return [$currentBonus + $bonus, $bonus];
        }
        return [$bonus, 0];
    }

    /**
     * @return string
     */
    public function getName(): string
    {
        return 'vip_boost';
    }

}
