<?php

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

Route::get('/user', function (Request $request) {
    return $request->user();
})->middleware('auth:sanctum');

Route::prefix('kategori')->group(function () {
    Route::get('list', [KategoriController::class, 'getAllKategori']);
    Route::get('{id}', [KategoriController::class, 'show']);
});
Route::apiResource('rumus', RumusController::class)->only(['index', 'show']);
Route::prefix('banner')->group(function () {
    Route::get('list', [BannerController::class, 'getAllBanner']);
    Route::get('{id}', [BannerController::class, 'show']);
});
Route::apiResource('series', SeriesController::class)->only(['index', 'show']);
Route::apiResource('product', ProductController::class)->only(['index', 'show']);
Route::apiResource('toko', TokoController::class)->only(['index', 'show']);
Route::apiResource('artikel', ArtikelController::class)->only(['index', 'show']);
Route::apiResource('tutorial-gambar', TutorialGambarController::class)->only(['index', 'show']);
Route::apiResource('tutorial-video', TutorialVideoController::class)->only(['index', 'show']);

Route::middleware('auth:sanctum')->group(function () {
    Route::apiResource('kategori', KategoriController::class)->only(['store', 'update', 'destroy']);
    Route::apiResource('rumus', RumusController::class)->only(['store', 'update', 'destroy']);
    Route::apiResource('banner', BannerController::class)->only(['store', 'update', 'destroy']);
    Route::apiResource('series', SeriesController::class)->only(['store', 'update', 'destroy']);
    Route::apiResource('product', ProductController::class)->only(['store', 'update', 'destroy']);
    Route::apiResource('toko', TokoController::class)->only(['store', 'update', 'destroy']);
    Route::apiResource('artikel', ArtikelController::class)->only(['store', 'update', 'destroy']);
    Route::apiResource('tutorial-gambar', TutorialGambarController::class)->only(['store', 'update', 'destroy']);
    Route::apiResource('tutorial-video', TutorialVideoController::class)->only(['store', 'update', 'destroy']);
});