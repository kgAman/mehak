<?php

use App\Http\Controllers\ProfileController;
use App\Http\Controllers\InquiryController;
use App\Http\Controllers\ScheduleVisitController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\GalleryAdminController;
use App\Http\Controllers\PortfolioAdminController;
use App\Http\Controllers\TestimonialsAdminController;
use App\Http\Controllers\ServicesAdminController;
use App\Http\Controllers\AboutAdminController;
use App\Http\Controllers\ContactAdminController;
use Illuminate\Support\Facades\Route;
use App\Models\Gallery; 

/*
|--------------------------------------------------------------------------
| Public Routes
|--------------------------------------------------------------------------
*/

Route::get('/', function () {
    return redirect()->route('home');
});

Route::get('/home', function () {
    return view('home');
})->name('home');   

Route::get('/about', function () {
    return view('about');
})->name('about');

Route::get('/contact', function () {
    return view('contact');
})->name('contact');

Route::post('/contact-submit', [InquiryController::class, 'submit'])->name('contact.submit');

Route::get('/services', function () {
    return view('services');
})->name('services');

Route::get('/gallery', function () {
    $galleries = Gallery::where('is_active', true)->orderBy('created_at', 'desc')->get();
    return view('gallery', compact('galleries'));
})->name('gallery');

Route::get('/portfolio', function () {
    return view('portfolio');
})->name('portfolio');

Route::get('/testimonials', function () {
    return view('testimonials');
})->name('testimonials');

// Booking Frontend Routes
Route::get('/booking', function () {
    return view('booking');
})->name('booking');

Route::get('/book-visit', function () {
    return view('book'); 
})->name('booking.form');

Route::post('/booking-submit', [ScheduleVisitController::class, 'submit'])->name('booking.submit');


/*
|--------------------------------------------------------------------------
| Authenticated Admin Routes
|--------------------------------------------------------------------------
*/

Route::middleware('auth')->group(function () {
    
    // User Profile
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');

    // Dashboard
    Route::get('/dashboard', [DashboardController::class, 'index'])->name('dashboard');

    // Admin Resources (The "admin." prefix group)
    Route::prefix('admin')->name('admin.')->group(function () {

        Route::resource('gallery-admin', GalleryAdminController::class);
        Route::resource('portfolio-admin', PortfolioAdminController::class);
        Route::resource('testimonials-admin', TestimonialsAdminController::class);
        Route::resource('services-admin', ServicesAdminController::class);
        Route::resource('about-admin', AboutAdminController::class);
        Route::resource('contact-admin', ContactAdminController::class);
        
        // Inquiries Admin
        Route::resource('inquiries-admin', InquiryController::class);

        // Scheduled Visits (Bookings) Admin
        // FIXED: Since we are in the 'admin.' group, the name just needs to be 'visits.xxx'
        Route::get('/visits', [ScheduleVisitController::class, 'index'])->name('visits.index');
        Route::get('/visits/{id}', [ScheduleVisitController::class, 'show'])->name('visits.show');
        Route::post('/visits/{id}/status', [ScheduleVisitController::class, 'updateStatus'])->name('visits.updateStatus');

    });

    /* | Aliases for backward compatibility 
    | (Optional: Delete these once your Blade files use the admin. prefix)
    */
    Route::get('/inquiries', [InquiryController::class, 'index'])->name('inquiries.index');
    Route::get('/inquiries/{id}', [InquiryController::class, 'show'])->name('inquiries.show');
    
    Route::get('/bookings', [ScheduleVisitController::class, 'index'])->name('bookings.index');
    Route::get('/bookings/{id}', [ScheduleVisitController::class, 'show'])->name('bookings.show');

});

require __DIR__.'/auth.php';