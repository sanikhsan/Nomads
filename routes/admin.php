<?php

use App\Http\Controllers\Admin\DashboardController as AdminDashboard;
use App\Http\Controllers\Admin\GalleryController;
use App\Http\Controllers\Admin\ProfileController;
use App\Http\Controllers\Admin\RekeningController;
use App\Http\Controllers\Admin\TransactionController;
use App\Http\Controllers\Admin\TravelPackageController;
use App\Http\Middleware\EnsureUserRole;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Admin Routes
|--------------------------------------------------------------------------
*/

Route::prefix('admin')->middleware(['auth', 'verified', 'EnsureUserRole:admin'])->name('admin.')->group(function () {
    // Route Dashboard Admin
    Route::get('/dashboard', [AdminDashboard::class, 'index'])->name('dashboard');
    Route::get('/profile', [ProfileController::class, 'index'])->name('profile');
    Route::post('/profile', [ProfileController::class, 'updateProfile'])->name('profile.update');
    Route::get('/password', [ProfileController::class, 'password'])->name('password');
    Route::post('/password', [ProfileController::class, 'updatePassword'])->name('password.update');

    // Route untuk store dan delete gambar FilePond simpan di atas resource agar berjalan normal
    Route::get('gallery/list', [GalleryController::class, 'list'])->name('gallery.list');
    Route::post('gallery/upload', [GalleryController::class, 'filepond'])->name('gallery.upload');
    Route::delete('gallery/cancel', [GalleryController::class, 'cancel'])->name('gallery.cancel');
    // Route::resource('travels', TravelPackageController::class);
    Route::resources([
        'travels' => TravelPackageController::class,
        'gallery' => GalleryController::class,
        'transaction' => TransactionController::class,
        'rekening' => RekeningController::class
    ]);
    
});