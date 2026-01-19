<?php

namespace App\Http\Controllers;

use App\Models\TutorialVideo;
use Illuminate\Http\Request;

class TutorialVideoController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return TutorialVideo::with('kategori')->get();
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'kategori_id' => 'required|exists:kategori,id',
            'link' => 'nullable|string',
        ]);

        $tutorialVideo = TutorialVideo::create($request->all());
        return response()->json($tutorialVideo, 201);
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        $tutorialVideo = TutorialVideo::with('kategori')->findOrFail($id);
        return response()->json($tutorialVideo);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $tutorialVideo = TutorialVideo::findOrFail($id);

        $request->validate([
            'kategori_id' => 'sometimes|exists:kategori,id',
            'link' => 'nullable|string',
        ]);

        $tutorialVideo->update($request->all());
        return response()->json($tutorialVideo);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $tutorialVideo = TutorialVideo::findOrFail($id);
        $tutorialVideo->delete();
        return response()->json(['message' => 'TutorialVideo deleted successfully']);
    }
}
