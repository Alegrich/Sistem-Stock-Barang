<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\StockController;

Route::get('stocks', [StockController::class, 'index']);
Route::post('stocks', [StockController::class, 'store']);
Route::get('stocks/{id}', [StockController::class, 'show']);
Route::put('stocks/{id}', [StockController::class, 'update']);
Route::delete('stocks/{id}', [StockController::class, 'destroy']);