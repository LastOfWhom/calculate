<?php

namespace App\Http\Services;

class BonusCalculationService
{
    public function __construct(private array $rules) {}


    public function calculate($amount, $timestamp, $status)
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
