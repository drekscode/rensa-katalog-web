<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Artikel;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Storage;
use Kreait\Firebase\Messaging\CloudMessage;
use Kreait\Firebase\Messaging\Notification;
use Kreait\Laravel\Firebase\Facades\Firebase;

use App\Models\Kategori;

class AdminArtikelController extends Controller
{
    public function index(Request $request)
    {
        $query = Artikel::latest();

        if ($request->has('search')) {
            $search = $request->search;
            $query->where('judul', 'like', "%{$search}%")
                  ->orWhere('hastag_kategori', 'like', "%{$search}%")
                  ->orWhereHas('kategori', function($q) use ($search) {
                      $q->where('nama_kategori', 'like', "%{$search}%");
                  });
        }

        $artikels = $query->paginate(10);
        return view('admin.artikel.index', compact('artikels'));
    }

    public function create()
    {
        $kategoris = Kategori::all();
        return view('admin.artikel.create', compact('kategoris'));
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'kategori_id' => 'required|exists:kategori,id',
            'judul' => 'required|string|max:255|unique:artikel,judul',
            'foto' => 'nullable|image|mimes:jpeg,png,jpg,gif,webp|max:5120',
            'foto2' => 'nullable|image|mimes:jpeg,png,jpg,gif,webp|max:5120',
            'foto3' => 'nullable|image|mimes:jpeg,png,jpg,gif,webp|max:5120',
            'hastag_kategori' => 'nullable|string|max:255',
            'date' => 'nullable|date',
            'deskripsi' => 'nullable|string',
        ]);

        if ($request->hasFile('foto')) {
            $validated['foto'] = $request->file('foto')->store('artikel', 'public');
        }

        if ($request->hasFile('foto2')) {
            $validated['foto2'] = $request->file('foto2')->store('artikel', 'public');
        }

        if ($request->hasFile('foto3')) {
            $validated['foto3'] = $request->file('foto3')->store('artikel', 'public');
        }

        // Set date to today if not provided
        if (empty($validated['date'])) {
            $validated['date'] = now()->format('Y-m-d');
        }

        $artikel = Artikel::create($validated);

        $topic = env('FCM_ARTIKEL_TOPIC', 'artikel');

        try {
            $message = CloudMessage::withTarget('topic', $topic)
                ->withNotification(Notification::create($artikel->judul, 'Cek Sekarang'))
                ->withData([
                    'id' => (string) $artikel->id,
                    'slug' => (string) $artikel->slug,
                    'kategori_id' => (string) $artikel->kategori_id,
                    'type' => 'artikel',
                    'click_action' => 'FLUTTER_NOTIFICATION_CLICK',
                ])
                ->withAndroidConfig([
                    'priority' => 'high',
                    'notification' => [
                        'sound' => 'default',
                        'channel_id' => 'artikel_channel',
                    ],
                ]);

            $result = Firebase::messaging()->send($message);

            Log::info('FCM artikel notification sent', [
                'artikel_id' => $artikel->id,
                'result' => $result,
            ]);
        } catch (\Throwable $exception) {
            Log::warning('FCM artikel notification failed', [
                'artikel_id' => $artikel->id,
                'error' => $exception->getMessage(),
            ]);
        }

        if ($request->input('action') === 'save_and_add_another') {
            return redirect()->route('admin.artikel.create')
                ->with('success', 'Artikel created successfully. You can add another one below.');
        }

        return redirect()->route('admin.artikel.index')
            ->with('success', 'Artikel created successfully.');
    }

    public function edit(Artikel $artikel)
    {
        $kategoris = Kategori::all();
        return view('admin.artikel.edit', compact('artikel', 'kategoris'));
    }

    public function update(Request $request, Artikel $artikel)
    {
        $validated = $request->validate([
            'kategori_id' => 'required|exists:kategori,id',
            'judul' => 'required|string|max:255|unique:artikel,judul,' . $artikel->id,
            'foto' => 'nullable|image|mimes:jpeg,png,jpg,gif,webp|max:5120',
            'foto2' => 'nullable|image|mimes:jpeg,png,jpg,gif,webp|max:5120',
            'foto3' => 'nullable|image|mimes:jpeg,png,jpg,gif,webp|max:5120',
            'hastag_kategori' => 'nullable|string|max:255',
            'date' => 'nullable|date',
            'deskripsi' => 'nullable|string',
        ]);

        if ($request->hasFile('foto')) {
            if ($artikel->foto && !str_starts_with($artikel->foto, 'data:')) {
                Storage::disk('public')->delete($artikel->foto);
            }
            $validated['foto'] = $request->file('foto')->store('artikel', 'public');
        }

        if ($request->hasFile('foto2')) {
            if ($artikel->foto2 && !str_starts_with($artikel->foto2, 'data:')) {
                Storage::disk('public')->delete($artikel->foto2);
            }
            $validated['foto2'] = $request->file('foto2')->store('artikel', 'public');
        }

        if ($request->hasFile('foto3')) {
            if ($artikel->foto3 && !str_starts_with($artikel->foto3, 'data:')) {
                Storage::disk('public')->delete($artikel->foto3);
            }
            $validated['foto3'] = $request->file('foto3')->store('artikel', 'public');
        }

        // Set date to today if not provided
        if (empty($validated['date'])) {
            $validated['date'] = now()->format('Y-m-d');
        }

        $artikel->update($validated);

        if ($request->input('action') === 'save_and_add_another') {
            return redirect()->route('admin.artikel.create')
                ->with('success', 'Artikel updated successfully. You can add a new one below.');
        }

        return redirect()->route('admin.artikel.index')
            ->with('success', 'Artikel updated successfully.');
    }

    public function destroy(Artikel $artikel)
    {
        if ($artikel->foto && !str_starts_with($artikel->foto, 'data:')) {
            Storage::disk('public')->delete($artikel->foto);
        }
        if ($artikel->foto2 && !str_starts_with($artikel->foto2, 'data:')) {
            Storage::disk('public')->delete($artikel->foto2);
        }
        if ($artikel->foto3 && !str_starts_with($artikel->foto3, 'data:')) {
            Storage::disk('public')->delete($artikel->foto3);
        }

        $artikel->delete();

        return redirect()->route('admin.artikel.index')
            ->with('success', 'Artikel deleted successfully.');
    }
}
