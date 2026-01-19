<?php

namespace App\Http\Controllers;

use App\Models\Artikel;
use Illuminate\Http\Request;

class ArtikelController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return Artikel::with('kategori')->get();
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
        return response()->json($artikel, 201);
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        $artikel = Artikel::with('kategori')->findOrFail($id);
        return response()->json($artikel);
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
        return response()->json($artikel);
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
