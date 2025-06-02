<?php

namespace App\Http\Dto;

class BonusRequestDto
{
    /**
     * @param float $transactionAmount
     * @param string $timestamp
     * @param string $customerStatus
     */
    public function __construct(
        public float $transactionAmount,
        public string $timestamp,
        public string $customerStatus
    ) {}
}
