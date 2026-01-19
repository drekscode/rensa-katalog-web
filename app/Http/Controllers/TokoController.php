<?php

namespace App\Http\Controllers;

use App\Models\Toko;
use Illuminate\Http\Request;

class TokoController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return Toko::all();
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'nama_toko' => 'required|string',
            'alamat' => 'nullable|string',
            'link_maps' => 'nullable|string',
            'kontak' => 'nullable|string',
        ]);

        $toko = Toko::create($request->all());
        return response()->json($toko, 201);
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        $toko = Toko::findOrFail($id);
        return response()->json($toko);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $toko = Toko::findOrFail($id);

        $request->validate([
            'nama_toko' => 'sometimes|string',
            'alamat' => 'nullable|string',
            'link_maps' => 'nullable|string',
            'kontak' => 'nullable|string',
        ]);

        $toko->update($request->all());
        return response()->json($toko);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $toko = Toko::findOrFail($id);
        $toko->delete();
        return response()->json(['message' => 'Toko deleted successfully']);
    }
}
