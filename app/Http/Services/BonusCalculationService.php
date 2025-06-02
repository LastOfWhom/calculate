<?php

namespace App\Http\Services;

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
            [$newBonus, $added] = $rule->apply($amount, $data);

            if($added > 0){
                $applied[] = ['rule' => $rule->getName(), 'bonus' => (int) $added];
            }
            $bonus += $newBonus;
        }

        return [
            'total_bonus' => (int) $bonus,
            'applied_rules' => $applied,
        ];
    }
}
