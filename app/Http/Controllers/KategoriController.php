<?php

namespace App\Http\Controllers;

use App\Models\Kategori;
use Illuminate\Http\Request;
use Illuminate\Http\JsonResponse;

use App\Http\Resources\KategoriResource;

class KategoriController extends Controller
{
    /**
     * Display a listing of the resource.
     */

    public function getAllKategori()
    {
        $kategoris = Kategori::orderBy('id', 'asc')->get();
        return KategoriResource::collection($kategoris);
    }
}