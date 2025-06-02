<?php

namespace App\Http\Controllers\BonusCalculateInterface;

interface BonusCalculationService
{
    /**
     * @param int $bonus
     * @param array $data
     * @return array
     */
    public function apply(int $bonus, array $data): array ;

    /**
     * @return string
     */
    public function getName(): string;
}
