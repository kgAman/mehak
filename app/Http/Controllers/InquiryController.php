<?php

namespace App\Http\Controllers;

use App\Models\Inquiry;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class InquiryController extends Controller
{
    public function submit(Request $request)
    {
        $validated = $request->validate([
            'full_name' => 'required|string|max:255',
            'email_address' => 'required|email|max:255',
            'service_required' => 'required|string|max:255',
            'project_details' => 'required|string',
            'site_photo' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048'
        ]);

        $photoPath = null;
        if ($request->hasFile('site_photo')) {
            $photoPath = $request->file('site_photo')->store('site-photos', 'public');
        }

        $inquiry = Inquiry::create([
            'full_name' => $validated['full_name'],
            'email_address' => $validated['email_address'],
            'service_required' => $validated['service_required'],
            'project_details' => $validated['project_details'],
            'site_photo_path' => $photoPath
        ]);

        return redirect()->back()->with('success', 'Inquiry submitted successfully!');
    }
}