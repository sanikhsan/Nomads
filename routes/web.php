<?php

use App\Http\Controllers\EnsureRolesController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\RolesController;
use App\Http\Middleware\EnsureUserRole;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::get('/', function () {
    return view('landing.home');
})->name('landing');

Route::get('/roles', [EnsureRolesController::class, 'dashboard'])->middleware('auth');

Route::get('/checkout', function () {
    return view('landing.checkout-page');
})->name('checkout');

Route::get('/detail', function () {
    return view('landing.detail-page');
})->name('detail');

Route::get('/success', function () {
    return view('landing.success-checkout-page');
})->name('success');

Route::prefix('admin')->middleware(['auth', 'EnsureUserRole:admin'])->name('admin.')->group(function () {
    Route::get('/dashboard', function () {
        return view('admin.dashboard');
    })->name('dashboard');
});

Route::prefix('customer')->middleware(['auth', 'EnsureUserRole:customer'])->name('customer.')->group(function () {
    Route::get('/dashboard', function () {
        return view('customer.dashboard');
    })->name('dashboard');
});

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

require __DIR__.'/auth.php';
