<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Artikel;
use Illuminate\Http\Request;

use App\Models\Kategori;

class AdminArtikelController extends Controller
{
    public function index()
    {
        $artikels = Artikel::latest()->paginate(10);
        return view('admin.artikel.index', compact('artikels'));
    }

    public function create()
    {
        $kategoris = Kategori::all();
        return view('admin.artikel.create', compact('kategoris'));
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'kategori_id' => 'required|exists:kategori,id',
            'judul' => 'required|string|max:255',
            'konten' => 'required|string',
            'gambar' => 'nullable|string',
            'penulis' => 'nullable|string|max:255',
            'tanggal_publikasi' => 'nullable|date',
        ]);

        Artikel::create($validated);

        return redirect()->route('admin.artikel.index')
            ->with('success', 'Artikel created successfully.');
    }

    public function edit(Artikel $artikel)
    {
        $kategoris = Kategori::all();
        return view('admin.artikel.edit', compact('artikel', 'kategoris'));
    }

    public function update(Request $request, Artikel $artikel)
    {
        $validated = $request->validate([
            'kategori_id' => 'required|exists:kategori,id',
            'judul' => 'required|string|max:255',
            'konten' => 'required|string',
            'gambar' => 'nullable|string',
            'penulis' => 'nullable|string|max:255',
            'tanggal_publikasi' => 'nullable|date',
        ]);

        $artikel->update($validated);

        return redirect()->route('admin.artikel.index')
            ->with('success', 'Artikel updated successfully.');
    }

    public function destroy(Artikel $artikel)
    {
        $artikel->delete();

        return redirect()->route('admin.artikel.index')
            ->with('success', 'Artikel deleted successfully.');
    }
}
