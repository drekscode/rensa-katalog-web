<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Artikel;
use App\Models\Banner;
use App\Models\Kategori;
use App\Models\Product;
use App\Models\Series;
use App\Models\Toko;

class DashboardController extends Controller
{
    public function index()
    {
        $stats = [
            'kategori' => Kategori::count(),
            'series' => Series::count(),
            'products' => Product::count(),
            'banners' => Banner::count(),
            'toko' => Toko::count(),
            'artikel' => Artikel::count(),
        ];

        return view('admin.dashboard', compact('stats'));
    }
}
