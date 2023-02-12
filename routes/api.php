<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

Use App\Http\Controllers\CryptoCurrencyController;

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});



Route::get('/fetch_balance', [CryptoCurrencyController::class, 'GetFetchBalance']);
Route::get('/load_markets', [CryptoCurrencyController::class, 'GetLoadMarkets']);
