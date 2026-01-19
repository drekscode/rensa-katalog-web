<?php

namespace App\Http\Controllers;

use App\Models\TutorialGambar;
use Illuminate\Http\Request;

class TutorialGambarController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return TutorialGambar::with('kategori')->get();
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'kategori_id' => 'required|exists:kategori,id',
            'gambar' => 'nullable|string',
            'deskripsi' => 'nullable|string',
            'slug' => 'nullable|string',
        ]);

        $tutorialGambar = TutorialGambar::create($request->all());
        return response()->json($tutorialGambar, 201);
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        $tutorialGambar = TutorialGambar::with('kategori')->findOrFail($id);
        return response()->json($tutorialGambar);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $tutorialGambar = TutorialGambar::findOrFail($id);

        $request->validate([
            'kategori_id' => 'sometimes|exists:kategori,id',
            'gambar' => 'nullable|string',
            'deskripsi' => 'nullable|string',
            'slug' => 'nullable|string',
        ]);

        $tutorialGambar->update($request->all());
        return response()->json($tutorialGambar);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $tutorialGambar = TutorialGambar::findOrFail($id);
        $tutorialGambar->delete();
        return response()->json(['message' => 'TutorialGambar deleted successfully']);
    }
}
