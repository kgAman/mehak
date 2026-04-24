<?php

namespace App\Http\Controllers;

use App\Models\ScheduledVisit;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;
use App\Mail\VisitConfirmation;

class ScheduleVisitController extends Controller
{
    public function index()
    {
        $visits = ScheduledVisit::orderBy('preferred_date', 'desc')->get();
        return view('admin.visits.index', compact('visits'));
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
        $visit->update(['status' => $request->status]);
        
        return response()->json(['success' => true]);
    }
}