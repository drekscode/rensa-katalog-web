<?php

namespace App\Http\Controllers;

use App\Models\Kategori;
use Illuminate\Http\Request;
use Illuminate\Http\JsonResponse;

use App\Http\Resources\KategoriResource;

class KategoriController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return KategoriResource::collection(Kategori::all());
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'nama_kategori' => 'required|string|max:255',
            'keunggulan_produk' => 'nullable|string',
        ]);

        $kategori = Kategori::create($request->all());
        return new KategoriResource($kategori);
    }

    /**
     * Display the specified resource.
     */
    public function show(Kategori $kategori)
    {
        return new KategoriResource($kategori);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Kategori $kategori)
    {
        $request->validate([
            'nama_kategori' => 'required|string|max:255',
            'keunggulan_produk' => 'nullable|string',
        ]);

        $kategori->update($request->all());
        return new KategoriResource($kategori);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Kategori $kategori): JsonResponse
    {
        $kategori->delete();
        return response()->json(['message' => 'Kategori deleted successfully']);
    }

    public function getAllKategori()
    {
        $kategoris = Kategori::orderBy('id', 'asc')->get();
        return KategoriResource::collection($kategoris);
    }
}