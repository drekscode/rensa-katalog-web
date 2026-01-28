<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\HasilPasang;
use App\Models\Series;
use Illuminate\Http\Request;

class AdminHasilPasangController extends Controller
{
    public function index(Request $request)
    {
        $query = HasilPasang::with('series')->latest();

        if ($request->has('search')) {
            $search = $request->search;
            $query->where('nama_project', 'like', "%{$search}%")
                  ->orWhere('id_project', 'like', "%{$search}%")
                  ->orWhereHas('series', function($q) use ($search) {
                      $q->where('nama_series', 'like', "%{$search}%");
                  });
        }

        $hasilPasang = $query->paginate(10);
        return view('admin.hasil-pasang.index', compact('hasilPasang'));
    }

    public function create()
    {
        $series = Series::all();
        return view('admin.hasil-pasang.create', compact('series'));
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'foto' => 'required|image|mimes:jpeg,png,jpg,gif,webp|max:2048',
            'nama_project' => 'required|string|max:255',
            'tanggal' => 'required|date',
            'id_project' => 'required|string|max:255',
            'id_series' => 'required|exists:series,id',
        ]);

        if ($request->hasFile('foto')) {
            $file = $request->file('foto');
            $base64 = base64_encode(file_get_contents($file));
            $validated['foto'] = 'data:' . $file->getMimeType() . ';base64,' . $base64;
        }

        HasilPasang::create($validated);

        if ($request->input('action') === 'save_and_add_another') {
            return redirect()->route('admin.hasil-pasang.create')
                ->with('success', 'Project created successfully. You can add another one below.');
        }

        return redirect()->route('admin.hasil-pasang.index')
            ->with('success', 'Project created successfully.');
    }

    public function edit($id)
    {
        $hasilPasang = HasilPasang::findOrFail($id);
        $series = Series::all();
        return view('admin.hasil-pasang.edit', compact('hasilPasang', 'series'));
    }

    public function update(Request $request, $id)
    {
        $hasilPasang = HasilPasang::findOrFail($id);
        
        $validated = $request->validate([
            'foto' => 'nullable|image|mimes:jpeg,png,jpg,gif,webp|max:2048',
            'nama_project' => 'required|string|max:255',
            'tanggal' => 'required|date',
            'id_project' => 'required|string|max:255',
            'id_series' => 'required|exists:series,id',
        ]);

        if ($request->hasFile('foto')) {
            $file = $request->file('foto');
            $base64 = base64_encode(file_get_contents($file));
            $validated['foto'] = 'data:' . $file->getMimeType() . ';base64,' . $base64;
        }

        $hasilPasang->update($validated);

        if ($request->input('action') === 'save_and_add_another') {
            return redirect()->route('admin.hasil-pasang.create')
                ->with('success', 'Project updated successfully. You can add a new one below.');
        }

        return redirect()->route('admin.hasil-pasang.index')
            ->with('success', 'Project updated successfully.');
    }

    public function destroy($id)
    {
        $hasilPasang = HasilPasang::findOrFail($id);
        $hasilPasang->delete();

        return redirect()->route('admin.hasil-pasang.index')
            ->with('success', 'Project deleted successfully.');
    }
}
