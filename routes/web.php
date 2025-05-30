<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\LandingController;
use App\Http\Controllers\CheckoutController;
use App\Http\Controllers\ThankYouController;

// Route::get('/', function () {
//     return view('welcome');
// });

Route::get('/', [LandingController::class, 'index']);
Route::post('/checkout', [CheckoutController::class, 'store'])->name('checkout');
Route::get('/checkout', [CheckoutController::class, 'index']);
Route::get('/thank-you/{id}', [ThankYouController::class, 'show']);
