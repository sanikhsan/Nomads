<?php

use App\Http\Controllers\Admin\DashboardController as AdminDashboard;
use App\Http\Controllers\Admin\GalleryController;
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

    // Route untuk store dan delete gambar FilePond simpan di atas resource agar berjalan normal
    Route::get('gallery/list', [GalleryController::class, 'list'])->name('gallery.list');
    Route::post('gallery/upload', [GalleryController::class, 'filepond'])->name('gallery.upload');
    Route::delete('gallery/cancel', [GalleryController::class, 'cancel'])->name('gallery.cancel');
    // Route::resource('travels', TravelPackageController::class);
    Route::resources([
        'travels' => TravelPackageController::class,
        'gallery' => GalleryController::class,
    ]);
    
});