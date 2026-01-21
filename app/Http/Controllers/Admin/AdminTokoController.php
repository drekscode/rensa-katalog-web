<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Toko;
use Illuminate\Http\Request;

class AdminTokoController extends Controller
{
    public function index(Request $request)
    {
        $query = Toko::latest();

        if ($request->has('search')) {
            $search = $request->search;
            $query->where('nama_toko', 'like', "%{$search}%")
                  ->orWhere('alamat', 'like', "%{$search}%")
                  ->orWhere('kontak', 'like', "%{$search}%");
        }

        $tokos = $query->paginate(10);
        return view('admin.toko.index', compact('tokos'));
    }

    public function create()
    {
        return view('admin.toko.create');
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'nama_toko' => 'required|string|max:255',
            'alamat' => 'nullable|string',
            'kontak' => 'nullable|string|max:50',
            'link_maps' => 'nullable|string',
        ]);

        Toko::create($validated);

        if ($request->input('action') === 'save_and_add_another') {
            return redirect()->route('admin.toko.create')
                ->with('success', 'Toko created successfully. You can add another one below.');
        }

        return redirect()->route('admin.toko.index')
            ->with('success', 'Toko created successfully.');
    }

    public function edit(Toko $toko)
    {
        return view('admin.toko.edit', compact('toko'));
    }

    public function update(Request $request, Toko $toko)
    {
        $validated = $request->validate([
            'nama_toko' => 'required|string|max:255',
            'alamat' => 'nullable|string',
            'kontak' => 'nullable|string|max:50',
            'link_maps' => 'nullable|string',
        ]);

        $toko->update($validated);

        if ($request->input('action') === 'save_and_add_another') {
            return redirect()->route('admin.toko.create')
                ->with('success', 'Toko updated successfully. You can add a new one below.');
        }

        return redirect()->route('admin.toko.index')
            ->with('success', 'Toko updated successfully.');
    }

    public function destroy(Toko $toko)
    {
        $toko->delete();

        return redirect()->route('admin.toko.index')
            ->with('success', 'Toko deleted successfully.');
    }
}
