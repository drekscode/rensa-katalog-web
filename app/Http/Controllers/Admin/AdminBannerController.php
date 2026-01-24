<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Banner;
use Illuminate\Http\Request;

class AdminBannerController extends Controller
{
    public function index(Request $request)
    {
        $query = Banner::orderBy('urutan', 'asc')->latest();

        if ($request->has('search')) {
            $search = $request->search;
            $query->where('link', 'like', "%{$search}%");
        }

        $banners = $query->paginate(10);
        return view('admin.banner.index', compact('banners'));
    }

    public function create()
    {
        return view('admin.banner.create');
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'banner_image' => 'required|image|mimes:jpeg,png,jpg,gif|max:2048',
            'link' => 'nullable|string',
            'urutan' => 'nullable|integer',
        ]);

        if ($request->hasFile('banner_image')) {
            $file = $request->file('banner_image');
            $base64 = base64_encode(file_get_contents($file));
            $validated['banner_image'] = 'data:' . $file->getMimeType() . ';base64,' . $base64;
        }

        Banner::create($validated);

        if ($request->input('action') === 'save_and_add_another') {
            return redirect()->route('admin.banner.create')
                ->with('success', 'Banner created successfully. You can add another one below.');
        }

        return redirect()->route('admin.banner.index')
            ->with('success', 'Banner created successfully.');
    }

    public function edit(Banner $banner)
    {
        return view('admin.banner.edit', compact('banner'));
    }

    public function update(Request $request, Banner $banner)
    {
        $validated = $request->validate([
            'banner_image' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048',
            'link' => 'nullable|string',
            'urutan' => 'nullable|integer',
        ]);

        if ($request->hasFile('banner_image')) {
            $file = $request->file('banner_image');
            $base64 = base64_encode(file_get_contents($file));
            $validated['banner_image'] = 'data:' . $file->getMimeType() . ';base64,' . $base64;
        }

        $banner->update($validated);

        if ($request->input('action') === 'save_and_add_another') {
            return redirect()->route('admin.banner.create')
                ->with('success', 'Banner updated successfully. You can add a new one below.');
        }

        return redirect()->route('admin.banner.index')
            ->with('success', 'Banner updated successfully.');
    }

    public function destroy(Banner $banner)
    {
        $banner->delete();

        return redirect()->route('admin.banner.index')
            ->with('success', 'Banner deleted successfully.');
    }
}
