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

Route::apiResource('kategori', KategoriController::class);
Route::apiResource('rumus', RumusController::class);
Route::apiResource('banner', BannerController::class);
Route::apiResource('series', SeriesController::class);
Route::apiResource('product', ProductController::class);
Route::apiResource('toko', TokoController::class);
Route::apiResource('artikel', ArtikelController::class);
Route::apiResource('tutorial-gambar', TutorialGambarController::class);
Route::apiResource('tutorial-video', TutorialVideoController::class);