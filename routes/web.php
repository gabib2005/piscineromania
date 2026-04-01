<?php

use App\Http\Controllers\HomeController;
use App\Http\Controllers\ShopController;
use App\Http\Controllers\CartController;
use App\Http\Controllers\OrderController;
use App\Http\Controllers\AccountController;
use App\Http\Controllers\SocialiteController;
use App\Http\Controllers\StripeWebhookController;
use Illuminate\Support\Facades\Route;

// Public shop routes
Route::get('/', [HomeController::class, 'index'])->name('home');
Route::get('/produse', [ShopController::class, 'index'])->name('shop.index');
Route::get('/produse/{category}', [ShopController::class, 'category'])->name('shop.category');
Route::get('/produse/{category}/{slug}', [ShopController::class, 'show'])->name('shop.show');
Route::get('/cautare', [ShopController::class, 'search'])->name('shop.search');

// Cart
Route::get('/cos', [CartController::class, 'index'])->name('cart.index');
Route::post('/cos/adauga', [CartController::class, 'add'])->name('cart.add');
Route::post('/cos/modifica', [CartController::class, 'update'])->name('cart.update');
Route::post('/cos/sterge', [CartController::class, 'remove'])->name('cart.remove');
Route::get('/cos/count', [CartController::class, 'count'])->name('cart.count');

// Stripe webhook (excluded from CSRF in bootstrap/app.php)
Route::post('/stripe/webhook', [StripeWebhookController::class, 'handleWebhook'])->name('stripe.webhook');

// OAuth (Socialite)
Route::get('/auth/google', [SocialiteController::class, 'redirectGoogle'])->name('auth.google');
Route::get('/auth/google/callback', [SocialiteController::class, 'callbackGoogle']);
Route::get('/auth/facebook', [SocialiteController::class, 'redirectFacebook'])->name('auth.facebook');
Route::get('/auth/facebook/callback', [SocialiteController::class, 'callbackFacebook']);

// Authenticated routes
Route::middleware('auth')->group(function () {
    Route::get('/comanda', [OrderController::class, 'checkout'])->name('order.checkout');
    Route::post('/comanda', [OrderController::class, 'store'])->name('order.store');
    Route::get('/comanda/confirmare/{orderNumber}', [OrderController::class, 'confirmation'])->name('order.confirmation');
    Route::get('/comanda/plata/{orderNumber}', [OrderController::class, 'payment'])->name('order.payment');
    Route::post('/comanda/plata/{orderNumber}/intent', [OrderController::class, 'createPaymentIntent'])->name('order.payment.intent');

    Route::get('/cont/comenzi', [AccountController::class, 'orders'])->name('account.orders');
    Route::get('/cont/profil', [AccountController::class, 'profile'])->name('account.profile');
    Route::put('/cont/profil', [AccountController::class, 'updateProfile'])->name('account.profile.update');
});

require __DIR__.'/auth.php';
