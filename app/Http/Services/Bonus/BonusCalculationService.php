<?php

namespace app\Http\Services\Bonus;

use app\Http\Interface\Bonus\BonusCalculateInterface;
use Mockery\Exception;

class BonusCalculationService
{
    /**
     * @var BonusCalculateInterface[]
     */
    private array $strategies;

    /**
     * @param BonusCalculateInterface[] $strategies
     */
    public function __construct(array $strategies = [])
    {
        $this->strategies = array_filter($strategies, fn($strategy) => $strategy instanceof BonusCalculateInterface);
        if (empty($this->strategies)) {
            throw new Exception('Передается не тот класс');
        }
    }


    /**
     * @param int $amount
     * @param string $timestamp
     * @param string $status
     * @return array
     */
    public function calculate(int $amount, string $timestamp, string $status): array
    {
        $data = compact('amount', 'timestamp', 'status');
        $bonus = 0;
        $applied = [];

        foreach ($this->strategies as $strategy) {
            [$newBonus, $added] = $strategy->apply($bonus, $data);

            if($added > 0){
                $applied[] = [
                    'rule' => $strategy->getName(),
                    'bonus' => round($added, 1),
                ];
            }
            $bonus = $newBonus;
        }

        return [
            'total_bonus' => $bonus,
            'applied_rules' => $applied,
        ];
    }
}
