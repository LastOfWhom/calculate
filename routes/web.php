<?php

use App\Http\Controllers\BonusController;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});

Route::post('/calculate-bonus', [BonusController::class, 'calculate']);
