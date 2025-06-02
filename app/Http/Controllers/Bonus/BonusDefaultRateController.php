<?php

namespace app\Http\Controllers\Bonus;

use app\Http\Interface\Bonus\BonusCalculateInterface;

class BonusDefaultRateController implements BonusCalculateInterface
{
    /**
     * @param int $bonus
     * @param array $data
     * @return array
     */
    public function apply(int $bonus, array $data): array
    {
        $currentBonus = floor($bonus / 10);

        return [$currentBonus + $bonus , $currentBonus];
    }

    public function getName(): string
    {
        return 'base rate';
    }
}
