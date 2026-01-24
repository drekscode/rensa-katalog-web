<?php

namespace App\Http\Controllers;

use App\Models\Rumus;
use Illuminate\Http\Request;

use App\Http\Resources\RumusResource;

class RumusController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    // public function index()
    // {
    //     return RumusResource::collection(Rumus::with('kategori')->orderBy('id', 'asc')->get());
    // }

    public function getRumusByKategori($kategoriId)
    {
        $rumuses = Rumus::where('kategori_id', $kategoriId)
            ->orderBy('id', 'asc')
            ->get();

        return response()->json([
            'data' => RumusResource::collection($rumuses),
        ]);
    }
}
