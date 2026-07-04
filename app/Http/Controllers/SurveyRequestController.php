<?php

namespace App\Http\Controllers;

use App\Models\SurveyRequest;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Log;

class SurveyRequestController extends Controller
{
    public function store(Request $request)
    {
        $validated = $request->validate([
            'nama' => 'required|string|max:255',
            'alamat' => 'required|string',
            'kontak' => 'required|string|max:255',
            'ruangan' => 'required|string',
            'images' => 'nullable|array',
            'images.*' => 'image|mimes:jpeg,png,jpg,gif,webp|max:5120',
        ]);

        try {
            return DB::transaction(function () use ($request, $validated) {
                $survey = SurveyRequest::create([
                    'nama' => $validated['nama'],
                    'alamat' => $validated['alamat'],
                    'kontak' => $validated['kontak'],
                    'ruangan' => $validated['ruangan'],
                    'status' => 'pending',
                    'dp_survey' => 50000,
                ]);

                if ($request->hasFile('images')) {
                    foreach ($request->file('images') as $file) {
                        $path = $file->store('survey-requests', 'public');
                        $survey->images()->create(['foto' => $path]);
                    }
                }

                return response()->json([
                    'success' => true,
                    'message' => 'Survey request submitted successfully',
                    'data' => $survey->load('images')
                ], 201);
            });
        } catch (\Exception $e) {
            Log::error('Failed to save survey request: ' . $e->getMessage());
            return response()->json([
                'success' => false,
                'message' => 'Failed to save survey request'
            ], 500);
        }
    }
}
