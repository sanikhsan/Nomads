<?php

use App\Http\Controllers\Customer\DashboardController;
use App\Http\Controllers\Customer\ProfileController;
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
    Route::get('/dashboard', [DashboardController::class, 'index'])->name('dashboard');
    Route::get('/profile', [ProfileController::class, 'index'])->name('profile');
    Route::post('/profile', [ProfileController::class, 'updateProfile'])->name('profile.update');
    Route::get('/password', [ProfileController::class, 'password'])->name('password');
    Route::post('/password', [ProfileController::class, 'updatePassword'])->name('password.update');

    // Route Upload Bukti Transaksi
    Route::get('transaction/{transaction}', [DashboardController::class, 'payment'])->name('transaction.payment');
    Route::get('transaction/detail/{transaction}', [DashboardController::class, 'detail'])->name('transaction.detail');
    Route::post('transaction/update/{transaction}', [DashboardController::class, 'update'])->name('transaction.update');
    Route::get('transaction/cancel/{transaction}', [DashboardController::class, 'cancel'])->name('transaction.cancel');
    // Filepond
    Route::post('transaction/upload', [DashboardController::class, 'filepond'])->name('transaction.upload');
    Route::delete('transaction/delete', [DashboardController::class, 'delete'])->name('transaction.delete');

    // Route Transcation LandingPage
    Route::get('checkout/{id}', [TransactionController::class, 'cart_review'])->name('cart_review');
    Route::post('checkout/{id}', [TransactionController::class, 'in_cart'])->name('in_cart');
    Route::post('/checkout/create/{detail_id}', [TransactionController::class, 'add_member'])->name('add_member');
    Route::get('/checkout/remove/{detail_id}', [TransactionController::class, 'remove_member'])->name('remove_member');
    Route::get('/checkout/success/{id}', [TransactionController::class, 'success'])->name('checkout-success');
    Route::get('/checkout/cancel/{id}', [TransactionController::class, 'cancel'])->name('checkout-cancel');
});