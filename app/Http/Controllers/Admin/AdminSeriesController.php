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
            'struktur_img' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048',
            'cover_area' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048',
            'material' => 'nullable|string',
            'deskripsi_produk' => 'nullable|string',
        ]);

        if ($request->hasFile('struktur_img')) {
            $validated['struktur_img'] = $request->file('struktur_img')->store('series/struktur', 'public');
        }

        if ($request->hasFile('cover_area')) {
            $validated['cover_area'] = $request->file('cover_area')->store('series/cover', 'public');
        }

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
            'struktur_img' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048',
            'cover_area' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048',
            'material' => 'nullable|string',
            'deskripsi_produk' => 'nullable|string',
        ]);

        if ($request->hasFile('struktur_img')) {
            $validated['struktur_img'] = $request->file('struktur_img')->store('series/struktur', 'public');
        }

        if ($request->hasFile('cover_area')) {
            $validated['cover_area'] = $request->file('cover_area')->store('series/cover', 'public');
        }

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
