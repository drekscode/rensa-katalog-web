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

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'banner_image' => 'required|string',
            'slug' => 'nullable|string',
            'link' => 'nullable|string',
        ]);

        $banner = Banner::create($request->all());
        return new BannerResource($banner);
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        $banner = Banner::findOrFail($id);
        return new BannerResource($banner);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $banner = Banner::findOrFail($id);

        $request->validate([
            'banner_image' => 'sometimes|string',
            'slug' => 'nullable|string',
            'link' => 'nullable|string',
            'urutan' => 'nullable|integer',
        ]);

        $banner->update($request->all());
        return new BannerResource($banner);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $banner = Banner::findOrFail($id);
        $banner->delete();
        return response()->json(['message' => 'Banner deleted successfully']);
    }

    public function getAllBanners()
    {
        $banners = Banner::orderBy('urutan', 'asc')->get();
        return BannerResource::collection($banners);
    }
}
