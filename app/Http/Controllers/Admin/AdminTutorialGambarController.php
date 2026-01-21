<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\TutorialGambar;
use Illuminate\Http\Request;

use App\Models\Kategori;

class AdminTutorialGambarController extends Controller
{
    public function index()
    {
        $tutorial_gambars = TutorialGambar::with('kategori')->orderBy('urutan', 'asc')->latest()->paginate(10);
        return view('admin.tutorial-gambar.index', compact('tutorial_gambars'));
    }

    public function create()
    {
        $kategoris = Kategori::all();
        return view('admin.tutorial-gambar.create', compact('kategoris'));
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'kategori_id' => 'required|exists:kategori,id',
            'judul' => 'required|string|max:255',
            'deskripsi' => 'nullable|string',
            'gambar_url' => 'required|string',
            'urutan' => 'nullable|integer',
        ]);

        TutorialGambar::create($validated);

        return redirect()->route('admin.tutorial-gambar.index')
            ->with('success', 'Tutorial Gambar created successfully.');
    }

    public function edit(TutorialGambar $tutorialGambar)
    {
        $kategoris = Kategori::all();
        $tutorial_gambar = $tutorialGambar;
        return view('admin.tutorial-gambar.edit', compact('tutorial_gambar', 'kategoris'));
    }

    public function update(Request $request, TutorialGambar $tutorialGambar)
    {
        $validated = $request->validate([
            'kategori_id' => 'required|exists:kategori,id',
            'judul' => 'required|string|max:255',
            'deskripsi' => 'nullable|string',
            'gambar_url' => 'required|string',
            'urutan' => 'nullable|integer',
        ]);

        $tutorialGambar->update($validated);

        return redirect()->route('admin.tutorial-gambar.index')
            ->with('success', 'Tutorial Gambar updated successfully.');
    }

    public function destroy(TutorialGambar $tutorialGambar)
    {
        $tutorialGambar->delete();

        return redirect()->route('admin.tutorial-gambar.index')
            ->with('success', 'Tutorial Gambar deleted successfully.');
    }
}
