<?php

namespace App\Http\Controllers;

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
        $validated = $request->validate([
            'transaction_amount' => 'required|numeric',
            'timestamp' => 'required|date',
            'customer_status' => 'required|in:regular,vip'
        ]);

        return response()->json(
            $service->calculate(
                $validated['transaction_amount'],
                $validated['timestamp'],
                $validated['customer_status']
            )
        );
    }
}
