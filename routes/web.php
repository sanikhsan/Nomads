<?php

use App\Http\Controllers\Admin\DashboardController as AdminDashboard;
use App\Http\Controllers\Admin\GalleryController;
use App\Http\Controllers\Admin\TravelPackageController;
use App\Http\Controllers\Customer\LandingPageController;
use App\Http\Controllers\EnsureRolesController;
use App\Http\Controllers\ProfileController;
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

Route::get('/', [LandingPageController::class, 'index'])->name('landing');
Route::get('/detail/{slug}', [LandingPageController::class, 'show'])->name('detail');


Route::get('/roles', [EnsureRolesController::class, 'dashboard'])->middleware('auth');

Route::get('/checkout', function () {
    return view('landing.checkout-page');
})->name('checkout');

Route::get('/success', function () {
    return view('landing.success-checkout-page');
})->name('success');

Route::prefix('admin')->middleware(['auth', 'verified', 'EnsureUserRole:admin'])->name('admin.')->group(function () {
    Route::get('/dashboard', [AdminDashboard::class, 'index'])->name('dashboard');

    // Route untuk store dan delete gambar FilePond
    // Ditaruh di atas resource agar berjalan normal
    Route::get('list', [GalleryController::class, 'list'])->name('gallery.list');
    Route::post('gallery/upload', [GalleryController::class, 'filepond'])->name('gallery.upload');
    Route::delete('gallery/cancel', [GalleryController::class, 'cancel'])->name('gallery.cancel');
    // Route::resource('travels', TravelPackageController::class);
    Route::resources([
        'travels' => TravelPackageController::class,
        'gallery' => GalleryController::class,
    ]);
    
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
