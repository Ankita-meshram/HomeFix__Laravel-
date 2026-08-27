<?php

namespace App\Http\Controllers;

use App\Models\Booking;
use Illuminate\Http\Request;

class UserBookingController extends Controller
{
    public function index()
    {
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