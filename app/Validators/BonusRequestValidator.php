<?php

namespace App\Validators;

use app\Http\Dto\Bonus\BonusRequestDto;
use Illuminate\Support\Facades\Validator;

class BonusRequestValidator
{
    /**
     * Create a new class instance.
     */
    public function __construct()
    {
        //
    }

    public static function validate(BonusRequestDTO $dto): void
    {
        $data = [
            'transaction_amount' => $dto->transactionAmount,
            'timestamp' => $dto->timestamp,
            'customer_status' => $dto->customerStatus,
        ];

        Validator::make($data, [
            'transaction_amount' => 'required|numeric',
            'timestamp' => 'required|date',
            'customer_status' => 'required|in:regular,vip',
        ])->validate();
    }
}

