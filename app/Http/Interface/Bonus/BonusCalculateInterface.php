<?php

namespace app\Http\Interface\Bonus;

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
