<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\WelcomeText;
use Illuminate\Http\Request;

class AdminWelcomeTextController extends Controller
{
    public function index()
    {
        $welcomeTexts = WelcomeText::latest()->paginate(10);
        return view('admin.welcome-text.index', compact('welcomeTexts'));
    }

    public function create()
    {
        return view('admin.welcome-text.create');
    }

    public function store(Request $request)
    {
        $request->merge([
            'is_active' => $request->has('is_active'),
        ]);

        $validated = $request->validate([
            'greeting' => 'required|string|max:255',
            'title' => 'required|string',
            'is_active' => 'boolean',
        ]);

        WelcomeText::create($validated);

        if ($request->input('action') === 'save_and_add_another') {
            return redirect()->route('admin.welcome-text.create')
                ->with('success', 'Welcome text created successfully. You can add another one below.');
        }

        return redirect()->route('admin.welcome-text.index')
            ->with('success', 'Welcome text created successfully.');
    }

    public function edit(WelcomeText $welcomeText)
    {
        return view('admin.welcome-text.edit', compact('welcomeText'));
    }

    public function update(Request $request, WelcomeText $welcomeText)
    {
        $request->merge([
            'is_active' => $request->has('is_active'),
        ]);

        $validated = $request->validate([
            'greeting' => 'required|string|max:255',
            'title' => 'required|string',
            'is_active' => 'boolean',
        ]);

        $welcomeText->update($validated);

        return redirect()->route('admin.welcome-text.index')
            ->with('success', 'Welcome text updated successfully.');
    }

    public function destroy(WelcomeText $welcomeText)
    {
        $welcomeText->delete();

        return redirect()->route('admin.welcome-text.index')
            ->with('success', 'Welcome text deleted successfully.');
    }

    public function toggleStatus(WelcomeText $welcomeText)
    {
        $welcomeText->update([
            'is_active' => !$welcomeText->is_active
        ]);

        return redirect()->back()->with('success', 'Status updated successfully.');
    }

    public function getWelcomeTextsJson()
    {
        $welcomeTexts = WelcomeText::get();
        return response()->json($welcomeTexts);
    }
}
