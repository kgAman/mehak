<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Contact;
use App\Models\ContactSubmission;
use Illuminate\Http\Request;

class ContactAdminController extends Controller
{
    public function index()
    {
        $contact = Contact::first();
        $submissions = ContactSubmission::latest()->paginate(15);
        return view('admin.contact.index', compact('contact', 'submissions'));
    }

    public function create()
    {
        return view('admin.contact.create');
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'company_name' => 'nullable|string|max:255',
            'address' => 'nullable|string',
            'phone' => 'nullable|string|max:50',
            'email' => 'nullable|email|max:255',
            'map_embed_url' => 'nullable|url',
            'business_hours' => 'nullable|string',
            'contact_form_enabled' => 'boolean',
            'social_facebook' => 'nullable|url',
            'social_twitter' => 'nullable|url',
            'social_instagram' => 'nullable|url',
            'social_linkedin' => 'nullable|url',
        ]);

        $validated['contact_form_enabled'] = $request->has('contact_form_enabled');

        Contact::create($validated);

        return redirect()->route('admin.contact-admin.index')
            ->with('success', 'Contact information created successfully.');
    }

    public function show(string $id)
    {
        $contact = Contact::findOrFail($id);
        return view('admin.contact.show', compact('contact'));
    }

    public function edit(string $id)
    {
        $contact = Contact::findOrFail($id);
        return view('admin.contact.edit', compact('contact'));
    }

    public function update(Request $request, string $id)
    {
        $contact = Contact::findOrFail($id);

        $validated = $request->validate([
            'company_name' => 'nullable|string|max:255',
            'address' => 'nullable|string',
            'phone' => 'nullable|string|max:50',
            'email' => 'nullable|email|max:255',
            'map_embed_url' => 'nullable|url',
            'business_hours' => 'nullable|string',
            'contact_form_enabled' => 'boolean',
            'social_facebook' => 'nullable|url',
            'social_twitter' => 'nullable|url',
            'social_instagram' => 'nullable|url',
            'social_linkedin' => 'nullable|url',
        ]);

        $validated['contact_form_enabled'] = $request->has('contact_form_enabled');
        $contact->update($validated);

        return redirect()->route('admin.contact-admin.index')
            ->with('success', 'Contact information updated successfully.');
    }

    public function destroy(string $id)
    {
        $contact = Contact::findOrFail($id);
        $contact->delete();

        return redirect()->route('admin.contact-admin.index')
            ->with('success', 'Contact information deleted successfully.');
    }

    // Additional methods for handling contact form submissions
    public function showSubmission(string $id)
    {
        $submission = ContactSubmission::findOrFail($id);
        return view('admin.contact.show-submission', compact('submission'));
    }

    public function deleteSubmission(string $id)
    {
        $submission = ContactSubmission::findOrFail($id);
        $submission->delete();

        return redirect()->route('admin.contact-admin.index')
            ->with('success', 'Contact submission deleted successfully.');
    }
}