<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\API\ProductApiController;
use App\Http\Controllers\CartController;

Route::apiResource('/dashboard', ProductApiController::class);
Route::get('/cart/count', [CartController::class, 'count'])->name('cart.count');
