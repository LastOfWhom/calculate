<?php

namespace App\Http\Controllers\BonusCalculateInterface;

interface BonusCalculationService
{
    public function apply($bonus, $data): array ;
    public function getName();
}
