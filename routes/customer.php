<?php

use App\Http\Controllers\Customer\TransactionController;
use App\Http\Middleware\EnsureUserRole;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Customer Routes
|--------------------------------------------------------------------------
*/

Route::get('/test', [TransactionController::class, 'test']);

Route::prefix('customer')->middleware(['auth', 'verified', 'EnsureUserRole:customer'])->name('customer.')->group(function () {
    // Route Dashboard Customer
    Route::get('/dashboard', function () {
        return view('customer.dashboard');
    })->name('dashboard');

    // Route Transcation LandingPage
    Route::get('checkout/{id}', [TransactionController::class, 'cart_review'])->name('cart_review');
    Route::post('checkout/{id}', [TransactionController::class, 'in_cart'])->name('in_cart');
    Route::post('/checkout/create/{detail_id}', [TransactionController::class, 'add_member'])->name('add_member');
    Route::get('/checkout/remove/{detail_id}', [TransactionController::class, 'remove_member'])->name('remove_member');
    Route::get('/checkout/success/{id}', [TransactionController::class, 'success'])->name('checkout-success');
    Route::get('/checkout/cancel/{id}', [TransactionController::class, 'cancel'])->name('checkout-cancel');
});