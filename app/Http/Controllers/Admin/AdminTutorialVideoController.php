<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\TutorialVideo;
use Illuminate\Http\Request;

use App\Models\Kategori;

class AdminTutorialVideoController extends Controller
{
    public function index()
    {
        $tutorial_videos = TutorialVideo::with('kategori')->latest()->paginate(10);
        return view('admin.tutorial-video.index', compact('tutorial_videos'));
    }

    public function create()
    {
        $kategoris = Kategori::all();
        return view('admin.tutorial-video.create', compact('kategoris'));
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'kategori_id' => 'required|exists:kategori,id',
            'judul' => 'required|string|max:255',
            'video_url' => 'required|string',
            'thumbnail' => 'nullable|string',
        ]);

        TutorialVideo::create($validated);

        return redirect()->route('admin.tutorial-video.index')
            ->with('success', 'Tutorial Video created successfully.');
    }

    public function edit(TutorialVideo $tutorialVideo)
    {
        $kategoris = Kategori::all();
        $tutorial_video = $tutorialVideo;
        return view('admin.tutorial-video.edit', compact('tutorial_video', 'kategoris'));
    }

    public function update(Request $request, TutorialVideo $tutorialVideo)
    {
        $validated = $request->validate([
            'kategori_id' => 'required|exists:kategori,id',
            'judul' => 'required|string|max:255',
            'video_url' => 'required|string',
            'thumbnail' => 'nullable|string',
        ]);

        $tutorialVideo->update($validated);

        return redirect()->route('admin.tutorial-video.index')
            ->with('success', 'Tutorial Video updated successfully.');
    }

    public function destroy(TutorialVideo $tutorialVideo)
    {
        $tutorialVideo->delete();

        return redirect()->route('admin.tutorial-video.index')
            ->with('success', 'Tutorial Video deleted successfully.');
    }
}
