<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Inquiry;
use App\Models\ScheduledVisit;
use App\Models\User;
use App\Models\Gallery;
use App\Models\Portfolio;
use App\Models\Testimonial;
use App\Models\Service;
use App\Models\About;

class DashboardController extends Controller
{
    public function index()
    {
        $dashboardData = [
            'inquiries' => Inquiry::count(),
            'bookings' => ScheduledVisit::count(),
            'users' => User::count(),
            'galleries' => Gallery::count(),
            'portfolios' => Portfolio::count(),
            'testimonials' => Testimonial::count(),
            'services' => Service::count(),
            'abouts' => About::count(),
            'latestInquiries' => Inquiry::latest()->take(5)->get(),
            'latestBookings' => ScheduledVisit::latest()->take(5)->get(),
        ];
        return view('admin.dashboard', compact('dashboardData'));
    }
}