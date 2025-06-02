<?php

namespace App\Http\Controllers;

use App\Http\Dto\BonusRequestDto;
use App\Http\Services\BonusCalculationService;
use App\Models\Bonus;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;

class BonusController extends Controller
{
    /**
     * @param Request $request
     * @param BonusCalculationService $service
     * @return JsonResponse
     */
    public function calculate(Request $request, BonusCalculationService $service): JsonResponse
    {
        $dto = new BonusRequestDTO(
            $request->input('transaction_amount'),
            $request->input('timestamp'),
            $request->input('customer_status')
        );

        return response()->json(
            $service->calculate(
                $dto->transactionAmount,
                $dto->timestamp,
                $dto->customerStatus
            )
        );
    }
}
