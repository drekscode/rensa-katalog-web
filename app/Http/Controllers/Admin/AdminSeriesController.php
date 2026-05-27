<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Kategori;
use App\Models\Series;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Storage;
use Kreait\Firebase\Messaging\CloudMessage;
use Kreait\Firebase\Messaging\Notification;
use Kreait\Laravel\Firebase\Facades\Firebase;

class AdminSeriesController extends Controller
{
    public function index(Request $request)
    {
        $query = Series::with('kategori')->latest();

        if ($request->has('search')) {
            $search = $request->search;
            $query->where(function ($q) use ($search) {
                $q->where('nama_series', 'like', "%{$search}%")
                  ->orWhere('keyword', 'like', "%{$search}%")
                  ->orWhereHas('kategori', function ($q2) use ($search) {
                      $q2->where('nama_kategori', 'like', "%{$search}%");
                  });
            });
        }

        $series = $query->paginate(10);
        return view('admin.series.index', compact('series'));
    }

    public function create()
    {
        $kategoris = Kategori::all();
        return view('admin.series.create', compact('kategoris'));
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'kategori_id' => 'required|exists:kategori,id',
            'nama_series' => 'required|string|max:255|unique:series,nama_series',
            'struktur_img' => 'nullable|image|mimes:jpeg,png,jpg,gif,webp|max:2048',
            'cover_area' => 'nullable|string',
            'material' => 'nullable|string',
            'ketebalan' => 'nullable|string',
            'ukuran' => 'nullable|string',
            'deskripsi_produk' => 'nullable|string',
            'keyword' => 'nullable|string|max:255',
        ]);

        if ($request->hasFile('struktur_img')) {
            $validated['struktur_img'] = $request->file('struktur_img')->store('series', 'public');
        }



        $series = Series::create($validated);

        $topic = env('FCM_SERIES_TOPIC', 'series');

        try {
            $message = CloudMessage::withTarget('topic', $topic)
                ->withNotification(Notification::create($series->nama_series, 'Cek Sekarang'))
                ->withData([
                    'id' => (string) $series->id,
                    'kategori_id' => (string) $series->kategori_id,
                    'type' => 'series',
                    'click_action' => 'FLUTTER_NOTIFICATION_CLICK',
                ])
                ->withAndroidConfig([
                    'priority' => 'high',
                    'notification' => [
                        'sound' => 'default',
                        'channel_id' => 'series_channel',
                    ],
                ]);

            $result = Firebase::messaging()->send($message);

            Log::info('FCM series notification sent', [
                'series_id' => $series->id,
                'result' => $result,
            ]);
        } catch (\Throwable $exception) {
            Log::warning('FCM series notification failed', [
                'series_id' => $series->id,
                'error' => $exception->getMessage(),
            ]);
        }

        if ($request->input('action') === 'save_and_add_another') {
            return redirect()->route('admin.series.create')
                ->with('success', 'Series created successfully. You can add another one below.');
        }

        return redirect()->route('admin.series.index')
            ->with('success', 'Series created successfully.');
    }

    public function edit(Series $series)
    {
        $kategoris = Kategori::all();
        return view('admin.series.edit', compact('series', 'kategoris'));
    }

    public function update(Request $request, Series $series)
    {
        $validated = $request->validate([
            'kategori_id' => 'required|exists:kategori,id',
            'nama_series' => 'required|string|max:255|unique:series,nama_series,' . $series->id,
            'struktur_img' => 'nullable|image|mimes:jpeg,png,jpg,gif,webp|max:2048',
            'cover_area' => 'nullable|string',
            'material' => 'nullable|string',
            'ketebalan' => 'nullable|string',
            'ukuran' => 'nullable|string',
            'deskripsi_produk' => 'nullable|string',
            'keyword' => 'nullable|string|max:255',
        ]);

        if ($request->hasFile('struktur_img')) {
            if ($series->struktur_img && !str_starts_with($series->struktur_img, 'data:')) {
                Storage::disk('public')->delete($series->struktur_img);
            }
            $validated['struktur_img'] = $request->file('struktur_img')->store('series', 'public');
        }



        $series->update($validated);

        if ($request->input('action') === 'save_and_add_another') {
            return redirect()->route('admin.series.create')
                ->with('success', 'Series updated successfully. You can add a new one below.');
        }

        return redirect()->route('admin.series.index')
            ->with('success', 'Series updated successfully.');
    }

    public function destroy(Series $series)
    {
        if ($series->struktur_img && !str_starts_with($series->struktur_img, 'data:')) {
            Storage::disk('public')->delete($series->struktur_img);
        }

        $series->delete();

        return redirect()->route('admin.series.index')
            ->with('success', 'Series deleted successfully.');
    }
}
