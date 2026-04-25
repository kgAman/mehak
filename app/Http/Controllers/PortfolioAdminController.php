<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Models\Portfolio;
use Illuminate\Http\Request;

class PortfolioAdminController extends Controller
{
    public function index()
    {
        $portfolios = Portfolio::paginate(10);
        return view('admin.portfolio.index', compact('portfolios'));
    }

    public function create()
    {
        return view('admin.portfolio.create');
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'title' => 'required|string|max:255',
            'category' => 'required|string|max:100',
            'image' => 'required|image|mimes:jpeg,png,jpg,gif|max:2048',
            'description' => 'nullable|string',
            'project_url' => 'nullable|url',
            'completion_date' => 'nullable|date',
        ]);

        if ($request->hasFile('image')) {
            $imagePath = $request->file('image')->store('portfolio', 'public');
            $validated['image'] = $imagePath;
        }

        Portfolio::create($validated);

        return redirect()->route('admin.portfolio-admin.index')
            ->with('success', 'Portfolio item created successfully.');
    }

    public function show(string $id)
    {
        $portfolio = Portfolio::findOrFail($id);
        return view('admin.portfolio.show', compact('portfolio'));
    }

    public function edit(string $id)
    {
        $portfolio = Portfolio::findOrFail($id);
        return view('admin.portfolio.edit', compact('portfolio'));
    }

    public function update(Request $request, string $id)
    {
        $portfolio = Portfolio::findOrFail($id);

        $validated = $request->validate([
            'title' => 'required|string|max:255',
            'category' => 'required|string|max:100',
            'image' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048',
            'description' => 'nullable|string',
            'project_url' => 'nullable|url',
            'completion_date' => 'nullable|date',
        ]);

        if ($request->hasFile('image')) {
            if ($portfolio->image) {
                \Storage::disk('public')->delete($portfolio->image);
            }
            $imagePath = $request->file('image')->store('portfolio', 'public');
            $validated['image'] = $imagePath;
        }

        $portfolio->update($validated);

        return redirect()->route('admin.portfolio-admin.index')
            ->with('success', 'Portfolio item updated successfully.');
    }

    public function destroy(string $id)
    {
        $portfolio = Portfolio::findOrFail($id);
        
        if ($portfolio->image) {
            \Storage::disk('public')->delete($portfolio->image);
        }
        
        $portfolio->delete();

        return redirect()->route('admin.portfolio-admin.index')
            ->with('success', 'Portfolio item deleted successfully.');
    }
}