<?php

// use App\Http\Controllers\Admin\DashboardController as AdminDashboard;
// use App\Http\Controllers\Admin\GalleryController;
// use App\Http\Controllers\Admin\TravelPackageController;
use App\Http\Controllers\Customer\LandingPageController;
// use App\Http\Controllers\Customer\TransactionController;
use App\Http\Controllers\EnsureRolesController;
use App\Http\Controllers\ProfileController;
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

Route::get('/roles', [EnsureRolesController::class, 'dashboard'])->middleware('auth')->name('dashboard');

Route::get('/', [LandingPageController::class, 'index'])->name('landing');
Route::get('/detail/{slug}', [LandingPageController::class, 'show'])->name('detail');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

require __DIR__.'/auth.php';
require __DIR__.'/admin.php';
require __DIR__.'/customer.php';
