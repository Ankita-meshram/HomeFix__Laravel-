<?php

namespace App\Http\Controllers;

use App\Models\Review;
use App\Models\Booking;
use App\Models\Technician;
use Illuminate\Http\Request;

class ReviewController extends Controller
{
    // Show review form
    public function create(Request $request)
    {
        $booking = Booking::with([
            'service',
            'technician'
        ])
        ->where('id', $request->booking_id)
        ->where('user_id', auth()->id())
        ->firstOrFail();

        // Review only for completed booking
        if ($booking->status !== 'completed') {
            abort(403, 'Review is only available for completed bookings.');
        }

        // Check if already reviewed
        $existingReview = Review::where('user_id', auth()->id())
            ->where('booking_id', $booking->id)
            ->first();

        if ($existingReview) {
            return redirect('/my-bookings')
                ->with('success', 'You have already reviewed this booking.');
        }

        return view('review', compact('booking'));
    }


    // Get all reviews
    public function index()
    {
        $reviews = Review::with([
            'user',
            'technician',
            'booking'
        ])
        ->latest()
        ->get();

        return response()->json($reviews);
    }


    // Get single review
    public function show($id)
    {
        $review = Review::with([
            'user',
            'technician',
            'booking'
        ])
        ->findOrFail($id);

        return response()->json($review);
    }


    // Create review
    public function store(Request $request)
    {
        $validated = $request->validate([
            'booking_id' => 'required|exists:bookings,id',
            'rating' => 'required|integer|min:1|max:5',
            'comment' => 'nullable|string|max:1000',
        ]);

        // Only allow logged-in user to review their own booking
        $booking = Booking::with('technician')
            ->where('id', $validated['booking_id'])
            ->where('user_id', auth()->id())
            ->firstOrFail();

        // Booking must be completed
        if ($booking->status !== 'completed') {
            return back()->withErrors([
                'rating' =>
                    'Review can only be submitted after the booking is completed.'
            ]);
        }

        // Technician must be assigned
        if (!$booking->technician_id) {
            return back()->withErrors([
                'rating' =>
                    'No technician is assigned to this booking.'
            ]);
        }

        // Prevent duplicate review
        $existingReview = Review::where('user_id', auth()->id())
            ->where('booking_id', $booking->id)
            ->first();

        if ($existingReview) {
            return redirect('/my-bookings')
                ->with('success', 'You have already reviewed this booking.');
        }

        // Create review
        $review = Review::create([
            'user_id' => auth()->id(),
            'technician_id' => $booking->technician_id,
            'booking_id' => $booking->id,
            'rating' => $validated['rating'],
            'comment' => $validated['comment'] ?? null,
        ]);

        // Recalculate technician rating
        $averageRating = Review::where(
            'technician_id',
            $booking->technician_id
        )->avg('rating');

        $booking->technician->update([
            'rating' => round($averageRating, 2)
        ]);

        return redirect('/my-bookings')
            ->with('success', 'Review submitted successfully.');
    }


    // Update review
    public function update(Request $request, $id)
    {
        $review = Review::findOrFail($id);

        // User can update only their own review
        if ($review->user_id !== auth()->id()) {
            abort(403, 'Unauthorized access.');
        }

        $validated = $request->validate([
            'rating' => 'required|integer|min:1|max:5',
            'comment' => 'nullable|string|max:1000',
        ]);

        $review->update($validated);

        // Recalculate technician rating
        $averageRating = Review::where(
            'technician_id',
            $review->technician_id
        )->avg('rating');

        Technician::where('id', $review->technician_id)->update([
            'rating' => round($averageRating ?? 0, 2)
        ]);

        return response()->json([
            'message' => 'Review updated successfully.',
            'review' => $review->load([
                'user',
                'technician',
                'booking'
            ])
        ]);
    }


    // Delete review
    public function destroy($id)
    {
        $review = Review::findOrFail($id);

        // User can delete only their own review
        if ($review->user_id !== auth()->id()) {
            abort(403, 'Unauthorized access.');
        }

        $technicianId = $review->technician_id;

        $review->delete();

        // Recalculate technician rating
        $averageRating = Review::where(
            'technician_id',
            $technicianId
        )->avg('rating');

        Technician::where('id', $technicianId)->update([
            'rating' => round($averageRating ?? 0, 2)
        ]);

        return response()->json([
            'message' => 'Review deleted successfully.'
        ]);
    }
}