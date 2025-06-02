<?php

namespace App\Http\Interface;

interface BonusCalculateInterface
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
