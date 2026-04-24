<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\About;
use Illuminate\Http\Request;

class AboutAdminController extends Controller
{
    public function index()
    {
        $about = About::first();
        return view('admin.about.index', compact('about'));
    }

    public function create()
    {
        return view('admin.about.create');
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'title' => 'required|string|max:255',
            'subtitle' => 'nullable|string|max:255',
            'content' => 'required|string',
            'mission' => 'nullable|string',
            'vision' => 'nullable|string',
            'image' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048',
            'years_of_experience' => 'nullable|integer',
            'completed_projects' => 'nullable|integer',
            'happy_clients' => 'nullable|integer',
        ]);

        if ($request->hasFile('image')) {
            $imagePath = $request->file('image')->store('about', 'public');
            $validated['image'] = $imagePath;
        }

        About::create($validated);

        return redirect()->route('admin.about-admin.index')
            ->with('success', 'About content created successfully.');
    }

    public function show(string $id)
    {
        $about = About::findOrFail($id);
        return view('admin.about.show', compact('about'));
    }

    public function edit(string $id)
    {
        $about = About::findOrFail($id);
        return view('admin.about.edit', compact('about'));
    }

    public function update(Request $request, string $id)
    {
        $about = About::findOrFail($id);

        $validated = $request->validate([
            'title' => 'required|string|max:255',
            'subtitle' => 'nullable|string|max:255',
            'content' => 'required|string',
            'mission' => 'nullable|string',
            'vision' => 'nullable|string',
            'image' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048',
            'years_of_experience' => 'nullable|integer',
            'completed_projects' => 'nullable|integer',
            'happy_clients' => 'nullable|integer',
        ]);

        if ($request->hasFile('image')) {
            if ($about->image) {
                \Storage::disk('public')->delete($about->image);
            }
            $imagePath = $request->file('image')->store('about', 'public');
            $validated['image'] = $imagePath;
        }

        $about->update($validated);

        return redirect()->route('admin.about-admin.index')
            ->with('success', 'About content updated successfully.');
    }

    public function destroy(string $id)
    {
        $about = About::findOrFail($id);
        
        if ($about->image) {
            \Storage::disk('public')->delete($about->image);
        }
        
        $about->delete();

        return redirect()->route('admin.about-admin.index')
            ->with('success', 'About content deleted successfully.');
    }
}