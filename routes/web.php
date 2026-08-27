<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ServiceController;
use App\Http\Controllers\TechnicianController;
use App\Http\Controllers\BookingController;
use App\Http\Controllers\ReviewController;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\AdminServiceController;
use App\Http\Controllers\AdminTechnicianController;
use App\Http\Controllers\AdminBookingController;
use App\Http\Controllers\AdminReviewController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\MyBookingController;


Route::view('/', 'home');
Route::view('/services', 'services');
Route::view('/booking', 'booking')
    ->middleware('auth'); 
Route::view('/technicians', 'technicians');
Route::view('/about', 'about');
Route::view('/contact', 'contact');

// ==================== REVIEW ROUTES ====================
Route::get('/review', [ReviewController::class, 'create'])
    ->middleware('auth');
    
Route::post('/review', [ReviewController::class, 'store'])
    ->middleware('auth');

Route::put('/review/{id}', [ReviewController::class, 'update'])
    ->middleware('auth');

Route::delete('/review/{id}', [ReviewController::class, 'destroy'])
    ->middleware('auth');

// Service API Routes
Route::get('/api/services', [ServiceController::class, 'index']);
Route::get('/api/services/{id}', [ServiceController::class, 'show']);
Route::middleware(['auth', 'admin'])->group(function () {

    Route::post('/api/services', [ServiceController::class, 'store']);

    Route::put('/api/services/{id}', [ServiceController::class, 'update']);

    Route::delete('/api/services/{id}', [ServiceController::class, 'destroy']);

});

// Technician API Routes - Public
Route::get('/api/technicians', [TechnicianController::class, 'index']);
Route::get('/api/technicians/{id}', [TechnicianController::class, 'show']);


// Technician API Routes - Admin Only
Route::middleware(['auth', 'admin'])->group(function () {

    Route::post('/api/technicians', [TechnicianController::class, 'store']);

    Route::put('/api/technicians/{id}', [TechnicianController::class, 'update']);

    Route::delete('/api/technicians/{id}', [TechnicianController::class, 'destroy']);

});

// Booking API Routes
Route::middleware('auth')->group(function () {

    Route::get('/api/bookings', [BookingController::class, 'index']);

    Route::get('/api/bookings/{id}', [BookingController::class, 'show']);

    Route::post('/api/bookings', [BookingController::class, 'store']);

    Route::put('/api/bookings/{id}', [BookingController::class, 'update']);

    Route::delete('/api/bookings/{id}', [BookingController::class, 'destroy']);

});

// Public review APIs
Route::get('/api/reviews', [ReviewController::class, 'index']);
Route::get('/api/reviews/{id}', [ReviewController::class, 'show']);


// Logged-in user review APIs
Route::middleware('auth')->group(function () {

    Route::post('/api/reviews', [ReviewController::class, 'store']);

    Route::put('/api/reviews/{id}', [ReviewController::class, 'update']);

    Route::delete('/api/reviews/{id}', [ReviewController::class, 'destroy']);

});

// ==================== ADMIN ROUTES ====================

Route::middleware(['auth', 'admin'])->group(function () {

    // Admin Dashboard
    Route::get('/admin/dashboard', [AdminController::class, 'dashboard']);

    // Admin Service Routes
    Route::get('/admin/services', [AdminServiceController::class, 'index']);
    Route::get('/admin/services/create', [AdminServiceController::class, 'create']);
    Route::post('/admin/services', [AdminServiceController::class, 'store']);
    Route::get('/admin/services/{id}/edit', [AdminServiceController::class, 'edit']);
    Route::put('/admin/services/{id}', [AdminServiceController::class, 'update']);
    Route::delete('/admin/services/{id}', [AdminServiceController::class, 'destroy']);

    // Admin Technician Routes
    Route::get('/admin/technicians', [AdminTechnicianController::class, 'index']);
    Route::get('/admin/technicians/create', [AdminTechnicianController::class, 'create']);
    Route::post('/admin/technicians', [AdminTechnicianController::class, 'store']);
    Route::get('/admin/technicians/{id}/edit', [AdminTechnicianController::class, 'edit']);
    Route::put('/admin/technicians/{id}', [AdminTechnicianController::class, 'update']);
    Route::delete('/admin/technicians/{id}', [AdminTechnicianController::class, 'destroy']);

    // Admin Booking Routes
    Route::get('/admin/bookings', [AdminBookingController::class, 'index']);

    Route::put('/admin/bookings/{id}/status', [
        AdminBookingController::class,
        'updateStatus'
    ]);

    // Admin Review Routes
    Route::get('/admin/reviews', [AdminReviewController::class, 'index']);

    Route::delete('/admin/reviews/{id}', [
        AdminReviewController::class,
        'destroy'
    ]);
});

// User Authentication Routes
Route::get('/register', [UserController::class, 'register']);
Route::post('/register', [UserController::class, 'store']);

Route::get('/login', [UserController::class, 'login'])->name('login');
Route::post('/login', [UserController::class, 'authenticate']);

Route::post('/logout', [UserController::class, 'logout']);

// User Booking Cancellation
Route::put('/bookings/{id}/cancel', [BookingController::class, 'destroy'])
    ->middleware('auth');

// My Bookings Route
Route::get('/my-bookings', [MyBookingController::class, 'index'])
    ->middleware('auth');
