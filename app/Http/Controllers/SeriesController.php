<?php

namespace App\Http\Controllers;

use App\Models\Series;
use Illuminate\Http\Request;

use App\Http\Resources\SeriesResource;

class SeriesController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function getAllSeries(Request $request)
    {
        $search = $request->query('search');

        $series = Series::with('kategori')
            ->when($search, function ($query) use ($search) {
                $query->where('nama_series', 'like', "%{$search}%");
            })
            ->orderBy('id', 'asc')
            ->get();

        return SeriesResource::collection($series);
    }

    public function getSeriesByKategori(Request $request, $kategoriId)
    {
        $search = $request->query('search');

        $series = Series::with('kategori')
            ->where('kategori_id', $kategoriId)
            ->when($search, function ($query) use ($search) {
                $query->where('nama_series', 'like', "%{$search}%");
            })
            ->orderBy('id', 'asc')
            ->get();

        return SeriesResource::collection($series);
    }

    public function getSeriesPaginate(Request $request)
    {
        $search = $request->query('search');

        $series = Series::with('kategori')
            ->when($search, function ($query) use ($search) {
                $query->where('nama_series', 'like', "%{$search}%");
            })
            ->orderBy('id', 'asc')
            ->paginate(4);

        return response()->json([
            'data' => SeriesResource::collection($series->items()),
            'meta' => [
                'current_page' => $series->currentPage(),
                'per_page' => $series->perPage(),
                'total' => $series->total(),
                'sisa_item' => max(
                    0,
                    $series->total() - ($series->currentPage() * $series->perPage())
                ),
            ]
        ]);
    }

    public function getProductsBySeries($seriesId)
    {
        $series = Series::with([
            'products',
            'kategori.tutorial_gambars',
            'kategori.tutorial_videos',
            'hasilPasang'
            ])->findOrFail($seriesId);

        return SeriesResource::make($series);
    }
}
