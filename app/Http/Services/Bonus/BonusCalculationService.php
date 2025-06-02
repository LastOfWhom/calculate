<?php

namespace app\Http\Services\Bonus;

class BonusCalculationService
{
    /**
     * @param array $rules
     */
    public function __construct(private readonly array $rules) {}


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

        foreach ($this->rules as $rule) {
            [$newBonus, $added] = $rule->apply($bonus, $data);

            if($added > 0){
                $applied[] = [
                    'rule' => $rule->getName(),
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
