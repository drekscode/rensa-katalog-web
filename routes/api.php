<?php

use App\Http\Controllers\Admin\AdminWelcomeTextController;
use App\Http\Controllers\ArtikelController;
use App\Http\Controllers\BannerController;
use App\Http\Controllers\KategoriController;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\RumusController;
use App\Http\Controllers\SeriesController;
use App\Http\Controllers\TokoController;
use App\Http\Controllers\TutorialGambarController;
use App\Http\Controllers\TutorialVideoController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

Route::prefix('categories')->group(function () {
    Route::get('/', [KategoriController::class, 'getAllKategori']);
    Route::get('{id}', [KategoriController::class, 'show']);
});

Route::prefix('banners')->group(function () {
    Route::get('/', [BannerController::class, 'getAllBanner']);
    Route::get('{id}', [BannerController::class, 'show']);
});

Route::prefix('series')->group(function () {
    Route::get('/', [SeriesController::class, 'getAllSeries']);
    Route::get('by-category/{kategoriId}', [SeriesController::class, 'getSeriesByKategori']);
    Route::get('paginate', [SeriesController::class, 'getSeriesPaginate']);
    Route::get('by-series/{seriesId}/products', [SeriesController::class, 'getProductsBySeries']);
});

Route::prefix('articles')->group(function () {
    Route::get('/', [ArtikelController::class, 'getArtikel']);
    Route::get('by-category/{kategoriId}', [ArtikelController::class, 'getArtikelPaginateByKategori']);
    // Route::get('by-category/tab/{kategoriId}', [ArtikelController::class, 'getArtikelPaginateTabByKategori']);
});

Route::prefix('formulas')->group(function () {
    Route::get('by-category/{kategoriId}', [RumusController::class, 'getRumusByKategori']);
});

Route::prefix('products')->group(function () {
    Route::get('/', [ProductController::class, 'getAllProduct']);
});

Route::prefix('stores')->group(function () {
    Route::get('/', [TokoController::class, 'getAllToko']);
});

Route::prefix('welcomes')->group(function () {
    Route::get('/', [AdminWelcomeTextController::class, 'getWelcomeTextsJson']);
});