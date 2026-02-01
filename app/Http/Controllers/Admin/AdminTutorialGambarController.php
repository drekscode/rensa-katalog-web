<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\TutorialGambar;
use Illuminate\Http\Request;

use App\Models\Kategori;
use Illuminate\Validation\Rule;

class AdminTutorialGambarController extends Controller
{
    public function index(Request $request)
    {
        $search = $request->get('search');
        
        // Get all categories with their tutorial gambar
        $query = Kategori::with(['tutorial_gambars' => function($q) use ($search) {
            $q->orderBy('urutan', 'asc')->orderBy('created_at', 'desc');
            
            if ($search) {
                $q->where(function($query) use ($search) {
                    $query->where('judul', 'like', "%{$search}%")
                          ->orWhere('deskripsi', 'like', "%{$search}%");
                });
            }
        }])->orderBy('nama_kategori', 'asc');

        // If search is active, also filter categories by name
        if ($search) {
            $query->where(function($q) use ($search) {
                $q->where('nama_kategori', 'like', "%{$search}%")
                  ->orWhereHas('tutorial_gambars', function($query) use ($search) {
                      $query->where('judul', 'like', "%{$search}%")
                            ->orWhere('deskripsi', 'like', "%{$search}%");
                  });
            });
        }

        $kategoris = $query->get();
        
        return view('admin.tutorial-gambar.index', compact('kategoris', 'search'));
    }

    public function create()
    {
        $kategoris = Kategori::all();
        return view('admin.tutorial-gambar.create', compact('kategoris'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'kategori_id' => 'required|exists:kategori,id',
            'items' => 'required|array|min:1',
            'items.*.judul' => 'required|string|max:255',
            'items.*.deskripsi' => 'nullable|string',
            'items.*.gambar' => 'required|image|mimes:jpeg,png,jpg,gif,webp|max:2048',
            'items.*.urutan' => [
                'nullable',
                'integer',
                'distinct',
                Rule::unique('tutorial_gambar')->where(function ($query) use ($request) {
                    return $query->where('kategori_id', $request->kategori_id);
                }),
            ],
        ]);

        $kategori_id = $request->kategori_id;
        $count = 0;

        foreach ($request->items as $item) {
            $data = [
                'kategori_id' => $kategori_id,
                'judul' => $item['judul'],
                'deskripsi' => $item['deskripsi'] ?? null,
                'urutan' => $item['urutan'] ?? null,
            ];

            // Handle Image
            if (isset($item['gambar']) && $item['gambar'] instanceof \Illuminate\Http\UploadedFile) {
                $file = $item['gambar'];
                $base64 = base64_encode(file_get_contents($file));
                $data['gambar'] = 'data:' . $file->getMimeType() . ';base64,' . $base64;
            }

            // Auto-assign order if empty
            if (empty($data['urutan'])) {
                $maxUrutan = TutorialGambar::where('kategori_id', $kategori_id)->max('urutan');
                $data['urutan'] = $maxUrutan ? $maxUrutan + 1 : 1;
            }

            TutorialGambar::create($data);
            $count++;
        }

        if ($request->input('action') === 'save_and_add_another') {
            return redirect()->route('admin.tutorial-gambar.create')
                ->with('success', "$count Tutorial Gambar(s) created successfully. You can add more below.");
        }

        return redirect()->route('admin.tutorial-gambar.index')
            ->with('success', "$count Tutorial Gambar(s) created successfully.");
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
            'urutan' => [
                'nullable',
                'integer',
                Rule::unique('tutorial_gambar')->where(function ($query) use ($request) {
                    return $query->where('kategori_id', $request->kategori_id);
                })->ignore($tutorialGambar->id),
            ],
        ]);

        if ($request->hasFile('gambar')) {
            $file = $request->file('gambar');
            $base64 = base64_encode(file_get_contents($file));
            $validated['gambar'] = 'data:' . $file->getMimeType() . ';base64,' . $base64;
        }

        // Auto-assign order if not provided and category changed or order is empty
        if (empty($validated['urutan'])) {
            $maxUrutan = TutorialGambar::where('kategori_id', $validated['kategori_id'])
                ->where('id', '!=', $tutorialGambar->id)
                ->max('urutan');
            $validated['urutan'] = $maxUrutan ? $maxUrutan + 1 : 1;
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
