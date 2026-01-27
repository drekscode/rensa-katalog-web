<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\TutorialGambar;
use Illuminate\Http\Request;

use App\Models\Kategori;

class AdminTutorialGambarController extends Controller
{
    public function index(Request $request)
    {
        $query = TutorialGambar::with('kategori')->orderBy('urutan', 'asc')->latest();

        if ($request->has('search')) {
            $search = $request->search;
            $query->where('judul', 'like', "%{$search}%")
                  ->orWhere('deskripsi', 'like', "%{$search}%")
                  ->orWhereHas('kategori', function($q) use ($search) {
                      $q->where('nama_kategori', 'like', "%{$search}%");
                  });
        }

        $tutorial_gambars = $query->paginate(10);
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
            'gambar' => 'required|image|mimes:jpeg,png,jpg,gif,webp|max:2048',
            'urutan' => 'nullable|integer',
        ]);

        if ($request->hasFile('gambar')) {
            $file = $request->file('gambar');
            $base64 = base64_encode(file_get_contents($file));
            $validated['gambar'] = 'data:' . $file->getMimeType() . ';base64,' . $base64;
        }

        TutorialGambar::create($validated);

        if ($request->input('action') === 'save_and_add_another') {
            return redirect()->route('admin.tutorial-gambar.create')
                ->with('success', 'Tutorial Gambar created successfully. You can add another one below.');
        }

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
            'gambar' => 'nullable|image|mimes:jpeg,png,jpg,gif,webp|max:2048',
            'urutan' => 'nullable|integer',
        ]);

        if ($request->hasFile('gambar')) {
            $file = $request->file('gambar');
            $base64 = base64_encode(file_get_contents($file));
            $validated['gambar'] = 'data:' . $file->getMimeType() . ';base64,' . $base64;
        }

        $tutorialGambar->update($validated);

        if ($request->input('action') === 'save_and_add_another') {
            return redirect()->route('admin.tutorial-gambar.create')
                ->with('success', 'Tutorial Gambar updated successfully. You can add a new one below.');
        }

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
