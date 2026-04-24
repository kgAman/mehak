<?php

use App\Http\Controllers\ProfileController;
use App\Http\Controllers\InquiryController;
use App\Http\Controllers\ScheduleVisitController;
use Illuminate\Support\Facades\Route;

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
    return view('gallery');
})->name('gallery');

Route::get('/portfolio', function () {
    return view('portfolio');
})->name('portfolio');

Route::get('/testimonials', function () {
    return view('testimonials');
})->name('testimonials');

Route::get('/booking', function () {
    return view('booking');
})->name('booking');
Route::post('/booking-visit', [ScheduleVisitController::class, 'submit'])->name('booking.submit');




Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');

    Route::get('/dashboard', function () { return view('dashboard'); })->name('dashboard');

    Route::get('/inquiries', [InquiryController::class, 'index'])->name('inquiries.index');
    Route::get('/inquiries/{id}', [InquiryController::class, 'show'])->name('inquiries.show');

    Route::get('/bookings', [ScheduleVisitController::class, 'index'])->name('bookings.index');
    Route::get('/bookings/{id}', [ScheduleVisitController::class, 'show'])->name('bookings.show');

    Route::prefix('admin')->name('admin.')->group(function () {

        Route::resource('gallery-admin', GalleryAdminController::class)->names('gallery-admin');
        Route::resource('portfolio-admin', PortfolioAdminController::class)->names('portfolio-admin');
        Route::resource('testimonials-admin', TestimonialsAdminController::class)->names('testimonials-admin');
        Route::resource('services-admin', ServicesAdminController::class)->names('services-admin');
        Route::resource('about-admin', AboutAdminController::class)->names('about-admin');
        Route::resource('contact-admin', ContactAdminController::class)->names('contact-admin');

    });

});

require __DIR__.'/auth.php';
