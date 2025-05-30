<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\LandingController;
use App\Http\Controllers\CheckoutController;
use App\Http\Controllers\ThankYouController;
use App\Http\Controllers\CartController;

// Route::get('/', function () {
//     return view('welcome');
// });

Route::get('/', [LandingController::class, 'index']);
Route::post('/checkout', [CheckoutController::class, 'store'])->name('checkout');
Route::get('/checkout', [CheckoutController::class, 'index']);
Route::get('/thank-you/{id}', [ThankYouController::class, 'show']);

Route::post('/checkout/quick', [CartController::class, 'quickCheckout'])->name('checkout.quick');

Route::post('/cart/add', [CartController::class, 'addToCart'])->name('cart.add');
Route::get('/cart', [CartController::class, 'showCart'])->name('cart.show');
Route::delete('/cart/remove/{index}', [CartController::class, 'removeItem'])->name('cart.remove');
Route::delete('/cart/clear', [CartController::class, 'clearCart'])->name('cart.clear');
