<?php

use app\Http\Controllers\Bonus\BonusController;
use Illuminate\Support\Facades\Route;

Route::post('/calculate-bonus', [BonusController::class, 'calculate']);
