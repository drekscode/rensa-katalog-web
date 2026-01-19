<?php

namespace App\Http\Controllers;

use App\Models\Rumus;
use Illuminate\Http\Request;

class RumusController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return Rumus::with('kategori')->get();
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'kategori_id' => 'required|exists:kategori,id',
            'ukuran' => 'nullable|string',
            'rumus' => 'nullable|string',
        ]);

        $rumus = Rumus::create($request->all());
        return response()->json($rumus, 201);
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        $rumus = Rumus::with('kategori')->findOrFail($id);
        return response()->json($rumus);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $rumus = Rumus::findOrFail($id);

        $request->validate([
            'kategori_id' => 'sometimes|exists:kategori,id',
            'ukuran' => 'nullable|string',
            'rumus' => 'nullable|string',
        ]);

        $rumus->update($request->all());
        return response()->json($rumus);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $rumus = Rumus::findOrFail($id);
        $rumus->delete();
        return response()->json(['message' => 'Rumus deleted successfully']);
    }
}
