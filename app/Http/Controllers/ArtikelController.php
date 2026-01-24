<?php

namespace App\Http\Controllers;

use App\Models\Artikel;
use Illuminate\Http\Request;

use App\Http\Resources\ArtikelResource;

class ArtikelController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function getArtikel()
    {
        return ArtikelResource::collection(Artikel::with('kategori')->orderBy('date', 'desc')->get());
    }

    public function getArtikelPaginateHPByKategori($kategoriId)
    {
        $artikels = Artikel::where('kategori_id', $kategoriId)
            ->with('kategori')
            ->orderBy('date', 'desc')
            ->paginate(3);

        return response()->json([
            'data' => ArtikelResource::collection($artikels->items()),
        ]);
    }

    public function getArtikelPaginateTabByKategori($kategoriId)
    {
        $artikels = Artikel::where('kategori_id', $kategoriId)
            ->with('kategori')
            ->orderBy('date', 'desc')
            ->paginate(6);

        return response()->json([
            'data' => ArtikelResource::collection($artikels->items()),
        ]);
    }

    /**
     * Store a newly created resource in storage.
     */
}
