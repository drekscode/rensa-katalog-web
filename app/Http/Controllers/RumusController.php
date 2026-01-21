<?php

namespace App\Http\Controllers;

use App\Models\Rumus;
use Illuminate\Http\Request;

use App\Http\Resources\RumusResource;

class RumusController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return RumusResource::collection(Rumus::with('kategori')->orderBy('id', 'asc')->get());
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
        return new RumusResource($rumus);
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        $rumus = Rumus::with('kategori')->findOrFail($id);
        return new RumusResource($rumus);
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
        return new RumusResource($rumus);
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
