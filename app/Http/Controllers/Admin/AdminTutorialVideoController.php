<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\TutorialVideo;
use Illuminate\Http\Request;

use App\Models\Kategori;

class AdminTutorialVideoController extends Controller
{
    public function index(Request $request)
    {
        $query = TutorialVideo::with('kategori')->latest();

        if ($request->has('search')) {
            $search = $request->search;
            $query->where('link', 'like', "%{$search}%")
                  ->orWhereHas('kategori', function($q) use ($search) {
                      $q->where('nama_kategori', 'like', "%{$search}%");
                  });
        }

        $tutorial_videos = $query->paginate(10);
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
            'link' => 'required|string',
        ]);

        TutorialVideo::create($validated);

        if ($request->input('action') === 'save_and_add_another') {
            return redirect()->route('admin.tutorial-video.create')
                ->with('success', 'Tutorial Video created successfully. You can add another one below.');
        }

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
            'link' => 'required|string',
        ]);

        $tutorialVideo->update($validated);

        if ($request->input('action') === 'save_and_add_another') {
            return redirect()->route('admin.tutorial-video.create')
                ->with('success', 'Tutorial Video updated successfully. You can add a new one below.');
        }

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
