<?php

namespace App\Http\Controllers;

use App\Models\Banner;
use Illuminate\Http\Request;

use App\Http\Resources\BannerResource;

class BannerController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function getAllBanner()
    {
        $banners = Banner::orderBy('urutan', 'asc')->get();
        return BannerResource::collection($banners);
    }
}
