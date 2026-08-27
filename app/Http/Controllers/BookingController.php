<?php

namespace App\Http\Controllers;

use App\Models\Booking;
use App\Models\Service;
use Illuminate\Http\Request;

class BookingController extends Controller
{
    // Get only logged-in user's bookings
    public function index()
    {
        $bookings = Booking::with([
            'user',
            'service',
            'technician'
        ])
        ->where('user_id', auth()->id())
        ->latest()
        ->get();

        return response()->json($bookings);
    }


    // Get only logged-in user's single booking
    public function show($id)
    {
        $booking = Booking::with([
            'user',
            'service',
            'technician'
        ])
        ->where('user_id', auth()->id())
        ->findOrFail($id);

        return response()->json($booking);
    }


    // Create booking
    public function store(Request $request)
    {
        $validated = $request->validate([
            'service_id' => 'required|exists:services,id',
            'technician_id' => 'nullable|exists:technicians,id',
            'booking_date' => 'required|date|after_or_equal:today',
            'booking_time' => 'required',
            'address' => 'required|string|max:500',
            'problem_description' => 'nullable|string',
        ]);

        // Automatically assign logged-in user
        $validated['user_id'] = auth()->id();

        // Get service price from database
        $service = Service::findOrFail($validated['service_id']);

        $validated['total_amount'] = $service->price;

        // New booking always starts as pending
        $validated['status'] = 'pending';

        $booking = Booking::create($validated);

        return response()->json([
            'message' => 'Booking created successfully.',
            'booking' => $booking->load([
                'user',
                'service',
                'technician'
            ])
        ], 201);
    }


    // Update user's own booking
    public function update(Request $request, $id)
    {
        $booking = Booking::where('user_id', auth()->id())
            ->findOrFail($id);

        $validated = $request->validate([
            'technician_id' => 'nullable|exists:technicians,id',
            'booking_date' => 'sometimes|required|date',
            'booking_time' => 'sometimes|required',
            'address' => 'sometimes|required|string|max:500',
            'problem_description' => 'nullable|string',
        ]);

        $booking->update($validated);

        return response()->json([
            'message' => 'Booking updated successfully.',
            'booking' => $booking->load([
                'user',
                'service',
                'technician'
            ])
        ]);
    }


    // Cancel user's own booking
    public function destroy($id)
    {
        $booking = Booking::where('user_id', auth()->id())
            ->findOrFail($id);

        $booking->update([
            'status' => 'cancelled'
        ]);

        return response()->json([
            'message' => 'Booking cancelled successfully.'
        ]);
    }
}