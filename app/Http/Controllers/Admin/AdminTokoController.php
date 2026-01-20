<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Toko;
use Illuminate\Http\Request;

class AdminTokoController extends Controller
{
    public function index()
    {
        $tokos = Toko::latest()->paginate(10);
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
            'telepon' => 'nullable|string|max:50',
            'maps_url' => 'nullable|string',
        ]);

        Toko::create($validated);

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
            'telepon' => 'nullable|string|max:50',
            'maps_url' => 'nullable|string',
        ]);

        $toko->update($validated);

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
