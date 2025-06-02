<?php

use Illuminate\Support\Facades\Route;

Route::post('/calculate-bonus', [\App\Http\Controllers\BonusController::class, 'calculate']);
