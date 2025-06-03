<?php

namespace app\Http\Controllers\Bonus;

use App\Http\Controllers\Controller;
use app\Http\Dto\Bonus\BonusRequestDto;
use app\Http\Services\Bonus\BonusCalculationService;
use App\Validators\BonusRequestValidator;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;
use Throwable;

class BonusController extends Controller
{
    /**
     * @param Request $request
     * @param BonusCalculationService $service
     * @return JsonResponse
     */
    public function calculate(Request $request, BonusCalculationService $service): JsonResponse
    {
        try {
            $bonus = new BonusRequestDTO(
                $request->input('transaction_amount'),
                $request->input('timestamp'),
                $request->input('customer_status')
            );
            BonusRequestValidator::validate($bonus);

            return response()->json(
                $service->calculate(
                    $bonus->transactionAmount,
                    $bonus->timestamp,
                    $bonus->customerStatus
                )
            );
        }catch (Throwable $ex){

            return response()->json([
                'code' => $ex->getCode(),
                'error' => $ex->getMessage()
            ], 400);
        }
    }
}
