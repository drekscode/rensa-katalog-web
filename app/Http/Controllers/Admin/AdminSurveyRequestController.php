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

    public function downloadImages($id)
    {
        $surveyRequest = SurveyRequest::with('images')->findOrFail($id);

        if ($surveyRequest->images->isEmpty()) {
            return redirect()->back()->with('error', 'Tidak ada gambar untuk diunduh.');
        }

        $zip = new \ZipArchive();
        $zipFileName = 'images-survey-' . $surveyRequest->id . '-' . strtolower(str_replace(' ', '-', $surveyRequest->nama)) . '.zip';
        $zipFilePath = storage_path('app/public/' . $zipFileName);

        if ($zip->open($zipFilePath, \ZipArchive::CREATE | \ZipArchive::OVERWRITE) === true) {
            foreach ($surveyRequest->images as $index => $img) {
                if ($img->foto) {
                    if (str_starts_with($img->foto, 'http') || str_starts_with($img->foto, 'data:')) {
                        try {
                            $fileContent = file_get_contents($img->foto);
                            if ($fileContent !== false) {
                                $ext = pathinfo(parse_url($img->foto, PHP_URL_PATH), PATHINFO_EXTENSION) ?: 'jpg';
                                $zip->addFromString('image-' . ($index + 1) . '.' . $ext, $fileContent);
                            }
                        } catch (\Exception $e) {
                            // Skip failing external urls
                        }
                    } else {
                        $absolutePath = Storage::disk('public')->path($img->foto);
                        if (file_exists($absolutePath)) {
                            $ext = pathinfo($absolutePath, PATHINFO_EXTENSION);
                            $zip->addFile($absolutePath, 'image-' . ($index + 1) . '.' . $ext);
                        }
                    }
                }
            }
            $zip->close();
        }

        if (file_exists($zipFilePath)) {
            return response()->download($zipFilePath)->deleteFileAfterSend(true);
        }

        return redirect()->back()->with('error', 'Gagal membuat file zip gambar.');
    }
}
