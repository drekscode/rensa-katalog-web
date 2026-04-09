<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Toko;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

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
            'nama_toko' => 'required|string|max:255|unique:toko,nama_toko',
            'alamat' => 'nullable|string',
            'kontak' => 'nullable|string|max:50',
            'link_maps' => 'nullable|string',
            'image' => 'nullable|image|mimes:jpeg,png,jpg,gif,webp|max:5120',
        ]);

        if ($request->hasFile('image')) {
            $validated['image'] = $request->file('image')->store('toko', 'public');
        }

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
            'nama_toko' => 'required|string|max:255|unique:toko,nama_toko,' . $toko->id,
            'alamat' => 'nullable|string',
            'kontak' => 'nullable|string|max:50',
            'link_maps' => 'nullable|string',
            'image' => 'nullable|image|mimes:jpeg,png,jpg,gif,webp|max:5120',
        ]);

        if ($request->hasFile('image')) {
            if ($toko->image && !str_starts_with($toko->image, 'data:')) {
                Storage::disk('public')->delete($toko->image);
            }
            $validated['image'] = $request->file('image')->store('toko', 'public');
        }

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
        if ($toko->image && !str_starts_with($toko->image, 'data:')) {
            Storage::disk('public')->delete($toko->image);
        }

        $toko->delete();

        return redirect()->route('admin.toko.index')
            ->with('success', 'Toko deleted successfully.');
    }
}
