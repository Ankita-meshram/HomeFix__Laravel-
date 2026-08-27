<?php

namespace App\Http\Controllers;

use App\Models\Booking;
use Illuminate\Http\Request;

class AdminBookingController extends Controller
{
    // Show all bookings
    public function index()
    {
        $bookings = Booking::with([
            'user',
            'service',
            'technician'
        ])->latest()->get();

        return view('admin.bookings.index', compact('bookings'));
    }

    // Update booking status
    public function updateStatus(Request $request, $id)
    {
        $request->validate([
            'status' => 'required|in:pending,confirmed,completed,cancelled',
        ]);

        $booking = Booking::findOrFail($id);

        $booking->update([
            'status' => $request->status
        ]);

        return redirect('/admin/bookings')
            ->with('success', 'Booking status updated successfully.');
    }
}