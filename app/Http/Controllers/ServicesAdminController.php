<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Models\Service;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class ServicesAdminController extends Controller
{
    public function index()
    {
        $services = Service::latest()->paginate(10);
        return view('admin.services.index', compact('services'));
    }

    public function create()
    {
        return view('admin.services.create');
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'title'   => 'required|string|max:255',
            'icon'    => 'required|string|max:100',
            'content' => 'required|string', // FIXED: Changed 'description' to 'content'
        ]);

        \App\Models\Service::create($validated);

        return redirect()->route('admin.services-admin.index')
            ->with('success', 'Service created successfully.');
    }

    public function show(string $id)
    {
        $service = Service::findOrFail($id);
        return view('admin.services.show', compact('service'));
    }

    public function edit(string $id)
    {
        $service = Service::findOrFail($id);
        return view('admin.services.edit', compact('service'));
    }

    public function update(Request $request, string $id)
    {
        $service = Service::findOrFail($id);

        $validated = $request->validate([
            'title'   => 'required|string|max:255',
            'icon'    => 'required|string|max:100',
            'content' => 'required|string', // FIXED: Changed 'description' to 'content'
        ]);

        $service->update($validated);

        return redirect()->route('admin.services-admin.index')
            ->with('success', 'Service updated successfully.');
    }

    public function destroy(string $id)
    {
        $service = Service::findOrFail($id);
        
        if ($service->image) {
            Storage::disk('public')->delete($service->image);
        }
        
        $service->delete();

        return redirect()->route('admin.services-admin.index')
            ->with('success', 'Service deleted successfully.');
    }
}