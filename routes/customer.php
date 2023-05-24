<?php

use App\Http\Controllers\Customer\TransactionController;
use App\Http\Middleware\EnsureUserRole;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Customer Routes
|--------------------------------------------------------------------------
*/

Route::prefix('customer')->middleware(['auth', 'verified', 'EnsureUserRole:customer'])->name('customer.')->group(function () {
    // Route Dashboard Customer
    Route::get('/dashboard', function () {
        return view('customer.dashboard');
    })->name('dashboard');

    // Route Transcation LandingPage
    Route::get('checkout/{id}', [TransactionController::class, 'index'])->name('checkout');
    Route::post('checkout/{id}', [TransactionController::class, 'process'])->name('checkout-process');
    Route::post('/checkout/create/{detail_id}', [TransactionController::class, 'create'])->name('checkout-create');
    Route::post('/checkout/remove/{detail_id}', [TransactionController::class, 'remove'])->name('checkout-remove');
    Route::get('/checkout/success/{id}', [TransactionController::class, 'success'])->name('checkout-success');
});