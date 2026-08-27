<?php

namespace App\Http\Controllers;

use App\Models\Booking;
use Illuminate\Http\RedirectResponse;
use Illuminate\View\View;

class MyBookingController extends Controller
{
    public function index(): View|RedirectResponse
    {
        // User login nahi hai to login page par bhejo
        if (!auth()->check()) {
            return redirect('/login');
        }

        // Sirf logged-in user ki bookings fetch hongi
        $bookings = Booking::with([
            'service',
            'technician'
        ])
        ->where('user_id', auth()->id())
        ->latest()
        ->get();

        return view('my-bookings', compact('bookings'));
    }
}