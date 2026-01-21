<?php

namespace App\Http\Controllers;

use App\Models\Toko;
use Illuminate\Http\Request;

use App\Http\Resources\TokoResource;

class TokoController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return TokoResource::collection(Toko::orderBy('id', 'asc')->get());
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
        return new TokoResource($toko);
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        $toko = Toko::findOrFail($id);
        return new TokoResource($toko);
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
        return new TokoResource($toko);
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
