<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Kategori;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class AdminKategoriController extends Controller
{
    public function index(Request $request)
    {
        $query = Kategori::latest();

        if ($request->has('search')) {
            $search = $request->search;
            $query->where('nama_kategori', 'like', "%{$search}%")
                  ->orWhere('keunggulan_produk', 'like', "%{$search}%");
        }

        $kategoris = $query->paginate(10);
        return view('admin.kategori.index', compact('kategoris'));
    }

    public function create()
    {
        return view('admin.kategori.create');
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'nama_kategori' => 'required|string|max:255|unique:kategori,nama_kategori',
            'keunggulan_produk' => 'nullable|string',
            'icon' => 'nullable|image|mimes:jpeg,png,jpg,gif,webp,svg|max:2048',
            'allowed_rumus' => 'nullable|array',
            'allowed_rumus.*' => 'in:Rumus Batang,Rumus Box,Rumus M2',
        ]);

        if ($request->hasFile('icon')) {
            $validated['icon'] = $request->file('icon')->store('kategori', 'public');
        }

        $validated['allowed_rumus'] = $request->input('allowed_rumus', []);

        Kategori::create($validated);

        if ($request->input('action') === 'save_and_add_another') {
            return redirect()->route('admin.kategori.create')
                ->with('success', 'Kategori created successfully. You can add another one below.');
        }

        return redirect()->route('admin.kategori.index')
            ->with('success', 'Kategori created successfully.');
    }

    public function edit(Kategori $kategori)
    {
        return view('admin.kategori.edit', compact('kategori'));
    }

    public function update(Request $request, Kategori $kategori)
    {
        $validated = $request->validate([
            'nama_kategori' => 'required|string|max:255|unique:kategori,nama_kategori,' . $kategori->id,
            'keunggulan_produk' => 'nullable|string',
            'icon' => 'nullable|image|mimes:jpeg,png,jpg,gif,webp,svg|max:2048',
            'allowed_rumus' => 'nullable|array',
            'allowed_rumus.*' => 'in:Rumus Batang,Rumus Box,Rumus M2',
        ]);

        if ($request->hasFile('icon')) {
            if ($kategori->icon && !str_starts_with($kategori->icon, 'data:')) {
                Storage::disk('public')->delete($kategori->icon);
            }
            $validated['icon'] = $request->file('icon')->store('kategori', 'public');
        }

        $validated['allowed_rumus'] = $request->input('allowed_rumus', []);

        $kategori->update($validated);

        if ($request->input('action') === 'save_and_add_another') {
            return redirect()->route('admin.kategori.create')
                ->with('success', 'Kategori updated successfully. You can add a new one below.');
        }

        return redirect()->route('admin.kategori.index')
            ->with('success', 'Kategori updated successfully.');
    }

    public function destroy(Kategori $kategori)
    {
        if ($kategori->icon && !str_starts_with($kategori->icon, 'data:')) {
            Storage::disk('public')->delete($kategori->icon);
        }
        $kategori->delete();

        return redirect()->route('admin.kategori.index')
            ->with('success', 'Kategori deleted successfully.');
    }
}
