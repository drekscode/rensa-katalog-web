<?php

namespace App\Http\Controllers;

use App\Models\Toko;
use Illuminate\Http\Request;

use App\Http\Resources\TokoResource;

class TokoController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function getAllToko()
    {
        return TokoResource::collection(Toko::orderBy('id', 'asc')->get());
    }
}
