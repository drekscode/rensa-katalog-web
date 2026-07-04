<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\SurveyRequest;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class AdminSurveyRequestController extends Controller
{
    public function index(Request $request)
    {
        $query = SurveyRequest::with('images')->latest();

        if ($request->filled('search')) {
            $search = $request->search;
            $query->where(function ($q) use ($search) {
                $q->where('nama', 'like', "%{$search}%")
                  ->orWhere('kontak', 'like', "%{$search}%")
                  ->orWhere('alamat', 'like', "%{$search}%");
            });
        }

        if ($request->filled('status')) {
            $query->where('status', $request->status);
        }

        $surveyRequests = $query->paginate(10)->withQueryString();

        return view('admin.survey-request.index', compact('surveyRequests'));
    }

    public function show($id)
    {
        $surveyRequest = SurveyRequest::with('images')->findOrFail($id);
        return view('admin.survey-request.show', compact('surveyRequest'));
    }

    public function update(Request $request, $id)
    {
        $surveyRequest = SurveyRequest::findOrFail($id);

        $validated = $request->validate([
            'status' => 'required|in:pending,scheduled,completed,cancelled'
        ]);

        $surveyRequest->update($validated);

        return redirect()->route('admin.survey-request.show', $id)
            ->with('success', 'Status updated successfully.');
    }

    public function destroy($id)
    {
        $surveyRequest = SurveyRequest::with('images')->findOrFail($id);

        foreach ($surveyRequest->images as $img) {
            if ($img->foto) {
                Storage::disk('public')->delete($img->foto);
            }
        }

        $surveyRequest->delete();

        return redirect()->route('admin.survey-request.index')
            ->with('success', 'Survey request deleted successfully.');
    }

    public function downloadImage($id, $index)
    {
        $surveyRequest = SurveyRequest::with('images')->findOrFail($id);
        $img = $surveyRequest->images->skip($index)->first();

        if (!$img || !$img->foto) {
            abort(404);
        }

        $filename = 'survey-' . $surveyRequest->id . '-image-' . ($index + 1);

        if (str_starts_with($img->foto, 'http') || str_starts_with($img->foto, 'data:')) {
            try {
                // Fetch external seed images through curl/file_contents securely on the server
                $context = stream_context_create([
                    "http" => [
                        "header" => "User-Agent: Mozilla/5.0 (Windows NT 10.0; Win64; x64)\r\n"
                    ]
                ]);
                $fileContent = file_get_contents($img->foto, false, $context);
                if ($fileContent !== false) {
                    $ext = pathinfo(parse_url($img->foto, PHP_URL_PATH), PATHINFO_EXTENSION) ?: 'jpg';
                    // Strip query parameters if any from extension
                    $ext = explode('?', $ext)[0];
                    $mimeType = 'image/' . $ext;
                    if ($ext === 'png') {
                        $mimeType = 'image/png';
                    } elseif ($ext === 'webp') {
                        $mimeType = 'image/webp';
                    }

                    return response($fileContent, 200, [
                        'Content-Type' => $mimeType,
                        'Content-Disposition' => 'attachment; filename="' . $filename . '.' . $ext . '"',
                    ]);
                }
            } catch (\Exception $e) {
                abort(404);
            }
        }

        $path = Storage::disk('public')->path($img->foto);
        if (!file_exists($path)) {
            abort(404);
        }

        return response()->download($path);
    }
}
