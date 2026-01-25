<?php

use App\Http\Controllers\Admin\AdminArtikelController;
use App\Http\Controllers\Admin\AdminBannerController;
use App\Http\Controllers\Admin\AdminKategoriController;
use App\Http\Controllers\Admin\AdminProductController;
use App\Http\Controllers\Admin\AdminRumusController;
use App\Http\Controllers\Admin\AdminSeriesController;
use App\Http\Controllers\Admin\AdminTokoController;
use App\Http\Controllers\Admin\AdminTutorialGambarController;
use App\Http\Controllers\Admin\AdminTutorialVideoController;
use App\Http\Controllers\Admin\AuthController;
use App\Http\Controllers\Admin\DashboardController;
use App\Http\Controllers\Admin\AdminWelcomeTextController;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return redirect()->route('admin.login');
});

Route::prefix('admin')->name('admin.')->group(function () {
    Route::get('/login', [AuthController::class, 'showLogin'])->name('login');
    Route::post('/login', [AuthController::class, 'login'])->name('login.post');

    Route::middleware('auth')->group(function () {
        Route::post('/logout', [AuthController::class, 'logout'])->name('logout');
        Route::get('/dashboard', [DashboardController::class, 'index'])->name('dashboard');
        
        Route::resource('kategori', AdminKategoriController::class);
        Route::resource('series', AdminSeriesController::class);
        Route::resource('product', AdminProductController::class);
        Route::resource('rumus', AdminRumusController::class)->parameters(['rumus' => 'rumus']);
        Route::resource('banner', AdminBannerController::class);
        Route::resource('toko', AdminTokoController::class);
        Route::resource('artikel', AdminArtikelController::class);
        Route::resource('tutorial-gambar', AdminTutorialGambarController::class);
        Route::resource('tutorial-video', AdminTutorialVideoController::class);
        Route::patch('welcome-text/{welcome_text}/toggle-status', [AdminWelcomeTextController::class, 'toggleStatus'])->name('welcome-text.toggle-status');
        Route::resource('welcome-text', AdminWelcomeTextController::class);
    });
});
