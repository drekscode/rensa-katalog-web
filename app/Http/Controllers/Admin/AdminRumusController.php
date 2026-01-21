<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Kategori;
use App\Models\Rumus;
use Illuminate\Http\Request;

class AdminRumusController extends Controller
{
    public function index(Request $request)
    {
        $query = Rumus::with('kategori')->latest();

        if ($request->has('search')) {
            $search = $request->search;
            $query->where('ukuran', 'like', "%{$search}%")
                  ->orWhere('rumus', 'like', "%{$search}%")
                  ->orWhereHas('kategori', function($q) use ($search) {
                      $q->where('nama_kategori', 'like', "%{$search}%");
                  });
        }

        $rumus = $query->paginate(10);
        return view('admin.rumus.index', compact('rumus'));
    }

    public function create()
    {
        $kategoris = Kategori::all();
        return view('admin.rumus.create', compact('kategoris'));
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'kategori_id' => 'required|exists:kategori,id',
            'ukuran' => 'required|string|max:255',
            'rumus' => 'required|string',
        ]);

        Rumus::create($validated);

        if ($request->input('action') === 'save_and_add_another') {
            return redirect()->route('admin.rumus.create')
                ->with('success', 'Rumus created successfully. You can add another one below.');
        }

        return redirect()->route('admin.rumus.index')
            ->with('success', 'Rumus created successfully.');
    }

    public function edit(Rumus $rumus)
    {
        $kategoris = Kategori::all();
        return view('admin.rumus.edit', compact('rumus', 'kategoris'));
    }

    public function update(Request $request, Rumus $rumus)
    {
        $validated = $request->validate([
            'kategori_id' => 'required|exists:kategori,id',
            'ukuran' => 'required|string|max:255',
            'rumus' => 'required|string',
        ]);

        $rumus->update($validated);

        if ($request->input('action') === 'save_and_add_another') {
            return redirect()->route('admin.rumus.create')
                ->with('success', 'Rumus updated successfully. You can add a new one below.');
        }

        return redirect()->route('admin.rumus.index')
            ->with('success', 'Rumus updated successfully.');
    }

    public function destroy(Rumus $rumus)
    {
        $rumus->delete();

        return redirect()->route('admin.rumus.index')
            ->with('success', 'Rumus deleted successfully.');
    }
}
