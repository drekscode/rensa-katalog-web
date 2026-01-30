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
    public function getArtikel(Request $request)
    {
        $search = $request->query('search');

        $artikels = Artikel::with('kategori')
            ->when($search, function ($query) use ($search) {
                $query->where('judul', 'like', "%{$search}%");
            })
            ->orderBy('date', 'desc')
            ->get();

        return ArtikelResource::collection($artikels);
    }

    public function getArtikelPaginateByKategori(Request $request, $kategoriId)
    {
        $search = $request->query('search');

        $artikels = Artikel::with('kategori')
            ->where('kategori_id', $kategoriId)
            ->when($search, function ($query) use ($search) {
                $query->where('judul', 'like', "%{$search}%");
            })
            ->orderBy('date', 'desc')
            ->paginate(6);

        return response()->json([
            'data' => ArtikelResource::collection($artikels->items()),
            'meta' => [
                'current_page' => $artikels->currentPage(),
                'per_page' => $artikels->perPage(),
                'total' => $artikels->total(),
            ],
        ]);
    }

    // public function getArtikelPaginateTabByKategori($kategoriId)
    // {
    //     $artikels = Artikel::where('kategori_id', $kategoriId)
    //         ->with('kategori')
    //         ->orderBy('date', 'desc')
    //         ->paginate(6);

    //     return response()->json([
    //         'data' => ArtikelResource::collection($artikels->items()),
    //     ]);
    // }

    /**
     * Store a newly created resource in storage.
     */
}
