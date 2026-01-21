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
    public function index()
    {
        return ArtikelResource::collection(Artikel::with('kategori')->orderBy('date', 'desc')->get());
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'kategori_id' => 'required|exists:kategori,id',
            'foto' => 'nullable|string',
            'deskripsi' => 'nullable|string',
            'hastag_kategori' => 'nullable|string',
            'date' => 'nullable|date',
            'slug' => 'nullable|string',
        ]);

        $artikel = Artikel::create($request->all());
        return new ArtikelResource($artikel);
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        $artikel = Artikel::with('kategori')->findOrFail($id);
        return new ArtikelResource($artikel);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $artikel = Artikel::findOrFail($id);

        $request->validate([
            'kategori_id' => 'sometimes|exists:kategori,id',
            'foto' => 'nullable|string',
            'deskripsi' => 'nullable|string',
            'hastag_kategori' => 'nullable|string',
            'date' => 'nullable|date',
            'slug' => 'nullable|string',
        ]);

        $artikel->update($request->all());
        return new ArtikelResource($artikel);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $artikel = Artikel::findOrFail($id);
        $artikel->delete();
        return response()->json(['message' => 'Artikel deleted successfully']);
    }
}
