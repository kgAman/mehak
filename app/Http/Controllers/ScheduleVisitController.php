<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller; // Make sure this is here!
use App\Models\ScheduledVisit;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;
// use App\Mail\VisitConfirmation; // Uncomment when you set up emails

class ScheduleVisitController extends Controller
{
    public function index()
    {
        $visits = ScheduledVisit::orderBy('preferred_date', 'desc')->get();
        $bookings = ScheduledVisit::orderBy('created_at', 'desc')->paginate(15);
        return view('admin.visits.index', compact('visits', 'bookings'));
    }

    public function show($id)
    {
        $visit = ScheduledVisit::findOrFail($id);
        return view('admin.visits.show', compact('visit'));
    }

    public function submit(Request $request)
    {
        $validated = $request->validate([
            'full_name' => 'required|string|max:255',
            'phone_number' => 'required|string|max:20',
            'email_address' => 'required|email|max:255',
            'property_location' => 'required|string|max:255',
            'preferred_date' => 'required|date|after_or_equal:today',
            'preferred_time' => 'required|date_format:H:i',
            'service_required' => 'required|string|max:255',
            'brief_details' => 'nullable|string'
        ]);

        $visit = ScheduledVisit::create($validated);

        // Optional: Send email confirmation
        // Mail::to($visit->email_address)->send(new VisitConfirmation($visit));

        return redirect()->back()->with('success', 'Your site visit has been scheduled successfully! We will contact you shortly to confirm.');
    }

public function updateStatus(Request $request, $id)
{
    $visit = ScheduledVisit::findOrFail($id);
    
    $request->validate([
        'status' => 'required|in:pending,confirmed,completed,cancelled'
    ]);

    $visit->update(['status' => $request->status]);
    
    // Redirect to the list view with a success notification
    return redirect()->route('admin.visits.index')
        ->with('success', 'Status for ' . $visit->full_name . ' has been updated to ' . strtoupper($request->status));
}
}