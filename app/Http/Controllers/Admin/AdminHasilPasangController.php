<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\HasilPasang;
use App\Models\Series;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class AdminHasilPasangController extends Controller
{
    public function index(Request $request)
    {
        $query = HasilPasang::with(['series', 'images'])->latest();

        if ($request->filled('search')) {
            $search = $request->search;
            $query->where(function ($q) use ($search) {
                $q->where('nama_project', 'like', "%{$search}%")
                  ->orWhere('id_project', 'like', "%{$search}%")
                  ->orWhereHas('series', function ($q2) use ($search) {
                      $q2->where('nama_series', 'like', "%{$search}%");
                  });
            });
        }

        $groupedHasilPasang = $query->get()->groupBy(fn ($item) => $item->id_series ?? 'unknown');

        return view('admin.hasil-pasang.index', compact('groupedHasilPasang'));
    }

    public function create()
    {
        $series = Series::all();
        return view('admin.hasil-pasang.create', compact('series'));
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'foto' => 'required|image|mimes:jpeg,png,jpg,gif,webp|max:5120',
            'images' => 'nullable|array',
            'images.*' => 'image|mimes:jpeg,png,jpg,gif,webp|max:5120',
            'nama_project' => 'required|string|max:255',
            'tanggal' => 'required|date',
            'id_project' => 'required|string|max:255|unique:hasil_pasang,id_project',
            'id_series' => 'required|exists:series,id',
        ]);

        if ($request->hasFile('foto')) {
            $validated['foto'] = $request->file('foto')->store('hasil-pasang', 'public');
        }

        $hasilPasang = HasilPasang::create($validated);

        if ($request->hasFile('images')) {
            foreach ($request->file('images') as $file) {
                $path = $file->store('hasil-pasang', 'public');
                $hasilPasang->images()->create(['foto' => $path]);
            }
        }

        if ($request->input('action') === 'save_and_add_another') {
            return redirect()->route('admin.hasil-pasang.create')
                ->with('success', 'Project created successfully. You can add another one below.');
        }

        return redirect()->route('admin.hasil-pasang.index')
            ->with('success', 'Project created successfully.');
    }

    public function edit($id)
    {
        $hasilPasang = HasilPasang::with('images')->findOrFail($id);
        $series = Series::all();
        return view('admin.hasil-pasang.edit', compact('hasilPasang', 'series'));
    }

    public function update(Request $request, $id)
    {
        $hasilPasang = HasilPasang::findOrFail($id);
        
        $validated = $request->validate([
            'foto' => 'nullable|image|mimes:jpeg,png,jpg,gif,webp|max:5120',
            'images' => 'nullable|array',
            'images.*' => 'image|mimes:jpeg,png,jpg,gif,webp|max:5120',
            'delete_images' => 'nullable|array',
            'delete_images.*' => 'integer|exists:hasil_pasang_images,id',
            'nama_project' => 'required|string|max:255',
            'tanggal' => 'required|date',
            'id_project' => 'required|string|max:255|unique:hasil_pasang,id_project,' . $id,
            'id_series' => 'required|exists:series,id',
        ]);

        if ($request->hasFile('foto')) {
            if ($hasilPasang->foto && !str_starts_with($hasilPasang->foto, 'data:')) {
                Storage::disk('public')->delete($hasilPasang->foto);
            }
            $validated['foto'] = $request->file('foto')->store('hasil-pasang', 'public');
        }

        $hasilPasang->update($validated);

        // Delete selected images
        if ($request->has('delete_images')) {
            $imagesToDelete = $hasilPasang->images()->whereIn('id', $request->delete_images)->get();
            foreach ($imagesToDelete as $img) {
                if ($img->foto && !str_starts_with($img->foto, 'data:')) {
                    Storage::disk('public')->delete($img->foto);
                }
                $img->delete();
            }
        }

        // Upload new dynamic images
        if ($request->hasFile('images')) {
            foreach ($request->file('images') as $file) {
                $path = $file->store('hasil-pasang', 'public');
                $hasilPasang->images()->create(['foto' => $path]);
            }
        }

        if ($request->input('action') === 'save_and_add_another') {
            return redirect()->route('admin.hasil-pasang.create')
                ->with('success', 'Project updated successfully. You can add a new one below.');
        }

        return redirect()->route('admin.hasil-pasang.index')
            ->with('success', 'Project updated successfully.');
    }

    public function show($id)
    {
        $hasilPasang = HasilPasang::with(['series', 'images'])->findOrFail($id);
        return view('admin.hasil-pasang.show', compact('hasilPasang'));
    }

    public function destroy($id)
    {
        $hasilPasang = HasilPasang::with('images')->findOrFail($id);
        
        if ($hasilPasang->foto && !str_starts_with($hasilPasang->foto, 'data:')) {
            Storage::disk('public')->delete($hasilPasang->foto);
        }

        foreach ($hasilPasang->images as $img) {
            if ($img->foto && !str_starts_with($img->foto, 'data:')) {
                Storage::disk('public')->delete($img->foto);
            }
        }

        $hasilPasang->delete();

        return redirect()->route('admin.hasil-pasang.index')
            ->with('success', 'Project deleted successfully.');
    }

    public function uploadImage(Request $request, $id)
    {
        $request->validate([
            'image' => 'required|image|mimes:jpeg,png,jpg,gif,webp|max:5120',
        ]);

        $hasilPasang = HasilPasang::findOrFail($id);

        if ($request->hasFile('image')) {
            $path = $request->file('image')->store('hasil-pasang', 'public');
            $img = $hasilPasang->images()->create(['foto' => $path]);

            return response()->json([
                'success' => true,
                'image' => [
                    'id' => $img->id,
                    'url' => asset('storage/' . $img->foto),
                ]
            ]);
        }

        return response()->json(['success' => false, 'message' => 'No file uploaded'], 400);
    }

    public function deleteImage($image_id)
    {
        $img = \App\Models\HasilPasangImage::findOrFail($image_id);
        
        if ($img->foto && !str_starts_with($img->foto, 'data:')) {
            Storage::disk('public')->delete($img->foto);
        }

        $img->delete();

        return response()->json(['success' => true]);
    }
}
