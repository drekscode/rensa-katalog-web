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
}
