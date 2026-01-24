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
    public function getAllSeries()
    {
        return SeriesResource::collection(Series::with('kategori')->orderBy('id', 'asc')->get());
    }

    public function getSeriesByKategori($kategoriId)
    {
        $series = Series::where('kategori_id', $kategoriId)->orderBy('id', 'asc')->get();
        return SeriesResource::collection($series);
    }

    public function getSeriesPaginate()
    {
        $series = Series::with('kategori')
            ->orderBy('id', 'asc')
            ->paginate(4);

        return response()->json([
            'data' => SeriesResource::collection($series->items()),
            'meta' => [
                'current_page' => $series->currentPage(),
                'per_page' => $series->perPage(),
                'total' => $series->total(),
                'sisa_item' => $series->total() - ($series->currentPage() * $series->perPage()),
            ]
        ]);
    }

    public function getProductsBySeries($seriesId)
    {
        $series = Series::with([
            'products',
            'kategori.tutorial_gambars',
            'kategori.tutorial_videos',
            ])->findOrFail($seriesId);

        return SeriesResource::make($series);
    }
}
