<?php

namespace App\Http\Controllers;

use App\Models\Service;
use App\Models\Technician;
use App\Models\Booking;
use App\Models\Review;

class AdminController extends Controller
{
    public function dashboard()
    {
        $servicesCount = Service::count();

        $techniciansCount = Technician::count();

        $bookingsCount = Booking::count();

        $reviewsCount = Review::count();

        $pendingBookings = Booking::where('status', 'pending')->count();

        $recentBookings = Booking::with([
            'user',
            'service',
            'technician'
        ])
        ->latest()
        ->take(5)
        ->get();

        return view('admin.dashboard', compact(
            'servicesCount',
            'techniciansCount',
            'bookingsCount',
            'reviewsCount',
            'pendingBookings',
            'recentBookings'
        ));
    }
}