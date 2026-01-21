<?php

namespace App\Http\Controllers;

use App\Models\Series;
use Illuminate\Http\Request;

use App\Http\Resources\SeriesResource;

class SeriesController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return SeriesResource::collection(Series::with('kategori')->orderBy('id', 'asc')->get());
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'kategori_id' => 'required|exists:kategori,id',
            'nama_series' => 'required|string',
            'struktur_img' => 'nullable|string',
            'cover_area' => 'nullable|string',
            'material' => 'nullable|string',
            'deskripsi_produk' => 'nullable|string',
        ]);

        $series = Series::create($request->all());
        return new SeriesResource($series);
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        $series = Series::with('kategori', 'products')->findOrFail($id);
        return new SeriesResource($series);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $series = Series::findOrFail($id);

        $request->validate([
            'kategori_id' => 'sometimes|exists:kategori,id',
            'nama_series' => 'sometimes|string',
            'struktur_img' => 'nullable|string',
            'cover_area' => 'nullable|string',
            'material' => 'nullable|string',
            'deskripsi_produk' => 'nullable|string',
        ]);

        $series->update($request->all());
        return new SeriesResource($series);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $series = Series::findOrFail($id);
        $series->delete();
        return response()->json(['message' => 'Series deleted successfully']);
    }
}
