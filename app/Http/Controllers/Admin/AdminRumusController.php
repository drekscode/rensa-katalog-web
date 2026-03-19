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
            $query->where(function ($q) use ($search) {
                $q->where('rumus', 'like', "%{$search}%")
                    ->orWhere('panjang', 'like', "%{$search}%")
                    ->orWhere('lebar', 'like', "%{$search}%")
                    ->orWhere('lembar', 'like', "%{$search}%")
                    ->orWhereHas('kategori', function ($subQuery) use ($search) {
                        $subQuery->where('nama_kategori', 'like', "%{$search}%");
                    });
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
            'rumus' => 'required|string',
            'panjang' => 'required_if:rumus,Rumus Batang,Rumus Box|nullable|numeric|min:0',
            'lebar' => 'required_if:rumus,Rumus Batang,Rumus Box|nullable|numeric|min:0',
            'lembar' => 'required_if:rumus,Rumus Box|nullable|integer|min:1',
        ]);

        Rumus::create($this->normalizeRumusFields($validated));

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
            'rumus' => 'required|string',
            'panjang' => 'required_if:rumus,Rumus Batang,Rumus Box|nullable|numeric|min:0',
            'lebar' => 'required_if:rumus,Rumus Batang,Rumus Box|nullable|numeric|min:0',
            'lembar' => 'required_if:rumus,Rumus Box|nullable|integer|min:1',
        ]);

        $rumus->update($this->normalizeRumusFields($validated));

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

    private function normalizeRumusFields(array $validated): array
    {
        if ($validated['rumus'] === 'Rumus Batang') {
            $validated['lembar'] = null;
            return $validated;
        }

        if ($validated['rumus'] === 'Rumus Box') {
            return $validated;
        }

        $validated['panjang'] = null;
        $validated['lebar'] = null;
        $validated['lembar'] = null;

        return $validated;
    }
}
