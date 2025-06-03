<?php

namespace app\Http\Controllers\Bonus;

use app\Http\Interface\Bonus\BonusCalculateInterface;

class VipBonusRateController implements BonusCalculateInterface
{
    public const VIP_KOEF = 0.4;

    /**
     * @param int $bonus
     * @param array $data
     * @return array
     */
    public function apply(int $bonus, array $data): array
    {
        if ($data['status'] === 'vip') {
            $currentBonus = $bonus * self::VIP_KOEF;

            return [$bonus + $currentBonus, $currentBonus];
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
