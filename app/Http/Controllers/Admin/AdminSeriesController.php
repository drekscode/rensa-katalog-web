<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Kategori;
use App\Models\Series;
use Illuminate\Http\Request;

class AdminSeriesController extends Controller
{
    public function index()
    {
        $series = Series::with('kategori')->latest()->paginate(10);
        return view('admin.series.index', compact('series'));
    }

    public function create()
    {
        $kategoris = Kategori::all();
        return view('admin.series.create', compact('kategoris'));
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'kategori_id' => 'required|exists:kategori,id',
            'nama_series' => 'required|string|max:255',
            'struktur_img' => 'nullable|string',
            'cover_area' => 'nullable|string',
            'material' => 'nullable|string',
            'deskripsi_produk' => 'nullable|string',
        ]);

        Series::create($validated);

        return redirect()->route('admin.series.index')
            ->with('success', 'Series created successfully.');
    }

    public function edit(Series $series)
    {
        $kategoris = Kategori::all();
        return view('admin.series.edit', compact('series', 'kategoris'));
    }

    public function update(Request $request, Series $series)
    {
        $validated = $request->validate([
            'kategori_id' => 'required|exists:kategori,id',
            'nama_series' => 'required|string|max:255',
            'struktur_img' => 'nullable|string',
            'cover_area' => 'nullable|string',
            'material' => 'nullable|string',
            'deskripsi_produk' => 'nullable|string',
        ]);

        $series->update($validated);

        return redirect()->route('admin.series.index')
            ->with('success', 'Series updated successfully.');
    }

    public function destroy(Series $series)
    {
        $series->delete();

        return redirect()->route('admin.series.index')
            ->with('success', 'Series deleted successfully.');
    }
}
