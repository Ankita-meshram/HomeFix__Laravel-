<?php

namespace App\Http\Controllers;

use App\Models\Review;

class AdminReviewController extends Controller
{
    // Show all reviews
    public function index()
    {
        $reviews = Review::with([
            'user',
            'technician',
            'booking'
        ])->latest()->get();

        return view('admin.reviews.index', compact('reviews'));
    }

    // Delete review
    public function destroy($id)
    {
        $review = Review::findOrFail($id);

        $review->delete();

        return redirect('/admin/reviews')
            ->with('success', 'Review deleted successfully.');
    }
}