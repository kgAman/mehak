<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Models\Testimonial;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class TestimonialsAdminController extends Controller
{
    public function index()
    {
        $testimonials = Testimonial::latest()->paginate(10);
        return view('admin.testimonials.index', compact('testimonials'));
    }

    public function create()
    {
        return view('admin.testimonials.create');
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'client_name' => 'required|string|max:255',
            'client_position' => 'nullable|string|max:100',
            'client_company' => 'nullable|string|max:255',
            'category' => 'required|string|max:255', // <-- ADDED THIS LINE
            'content' => 'required|string',
            'rating' => 'nullable|integer|min:1|max:5',
            'client_image' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048',
            'is_featured' => 'boolean',
        ]);

        if ($request->hasFile('client_image')) {
            $imagePath = $request->file('client_image')->store('testimonials', 'public');
            $validated['client_image'] = $imagePath;
        }

        $validated['is_featured'] = $request->has('is_featured');

        Testimonial::create($validated);

        return redirect()->route('admin.testimonials-admin.index')
            ->with('success', 'Testimonial created successfully.');
    }

    public function show(string $id)
    {
        $testimonial = Testimonial::findOrFail($id);
        return view('admin.testimonials.show', compact('testimonial'));
    }

    public function edit(string $id)
    {
        $testimonial = Testimonial::findOrFail($id);
        return view('admin.testimonials.edit', compact('testimonial'));
    }

    public function update(Request $request, string $id)
    {
        $testimonial = Testimonial::findOrFail($id);

        $validated = $request->validate([
            'client_name' => 'required|string|max:255',
            'client_position' => 'nullable|string|max:100',
            'client_company' => 'nullable|string|max:255',
            'category' => 'required|string|max:255', // <-- ADDED THIS LINE
            'content' => 'required|string',
            'rating' => 'nullable|integer|min:1|max:5',
            'client_image' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048',
            'is_featured' => 'boolean',
        ]);

        if ($request->hasFile('client_image')) {
            if ($testimonial->client_image) {
                Storage::disk('public')->delete($testimonial->client_image);
            }
            $imagePath = $request->file('client_image')->store('testimonials', 'public');
            $validated['client_image'] = $imagePath;
        }

        $validated['is_featured'] = $request->has('is_featured');
        $testimonial->update($validated);

        return redirect()->route('admin.testimonials-admin.index')
            ->with('success', 'Testimonial updated successfully.');
    }

    public function destroy(string $id)
    {
        $testimonial = Testimonial::findOrFail($id);
        
        if ($testimonial->client_image) {
            Storage::disk('public')->delete($testimonial->client_image);
        }
        
        $testimonial->delete();

        return redirect()->route('admin.testimonials-admin.index')
            ->with('success', 'Testimonial deleted successfully.');
    }
}