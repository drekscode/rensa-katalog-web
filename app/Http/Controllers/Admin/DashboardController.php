<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Artikel;
use App\Models\Banner;
use App\Models\Kategori;
use App\Models\Product;
use App\Models\Series;
use App\Models\Toko;
use App\Models\TutorialGambar;
use App\Models\TutorialVideo;

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
            'tutorial_gambar' => TutorialGambar::count(),
            'tutorial_video' => TutorialVideo::count(),
        ];

        $latest_artikels = Artikel::with('kategori')->latest()->take(5)->get();
        $latest_products = Product::with(['series', 'series.kategori'])->latest()->take(5)->get();
        $latest_toko = Toko::latest()->take(5)->get();

        // Data for category distribution chart
        $kategori_data = Kategori::withCount('series')->get()->map(function($kat) {
            return [
                'name' => $kat->nama_kategori,
                'count' => $kat->series_count
            ];
        });

        // Compute real storage usage percentage
        $totalSpace = disk_total_space(base_path());
        $freeSpace = disk_free_space(base_path());
        $usedSpace = $totalSpace - $freeSpace;
        $storagePercentage = round(($usedSpace / $totalSpace) * 100);

        return view('admin.dashboard', compact(
            'stats', 
            'latest_artikels', 
            'latest_products', 
            'latest_toko', 
            'kategori_data',
            'storagePercentage'
        ));
    }
}
