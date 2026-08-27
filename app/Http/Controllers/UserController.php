<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class UserController extends Controller
{
    // Show registration page
    public function register()
    {
        return view('register');
    }


    // Create new user
    public function store(Request $request)
    {
        $validated = $request->validate([
            'name' => 'required|string|max:255',

            'email' => [
                'required',
                'email',
                'max:255',
                'unique:users,email',
            ],

            'password' => [
                'required',
                'string',
                'min:6',
                'confirmed',
            ],
        ]);

        User::create([
            'name' => $validated['name'],
            'email' => $validated['email'],

            // Password is securely hashed
            'password' => Hash::make($validated['password']),

            // New registrations are always normal users
            'role' => 'user',
        ]);

        return redirect('/login')
            ->with(
                'success',
                'Registration successful. Please login.'
            );
    }


    // Show login page
    public function login()
    {
        // If already logged in, don't show login page
        if (Auth::check()) {

            if (Auth::user()->role === 'admin') {
                return redirect('/admin/dashboard');
            }

            return redirect('/my-bookings');
        }

        return view('login');
    }


    // Login user
    public function authenticate(Request $request)
    {
        $credentials = $request->validate([
            'email' => 'required|email|max:255',
            'password' => 'required|string',
        ]);

        if (Auth::attempt($credentials)) {

            // Prevent session fixation
            $request->session()->regenerate();

            $user = Auth::user();

            // Admin → Admin Dashboard
            if ($user->role === 'admin') {
                return redirect('/admin/dashboard');
            }

            // Normal user → My Bookings
            return redirect('/my-bookings');
        }

        // Login failed
        return back()
            ->withErrors([
                'email' => 'Invalid email or password.',
            ])
            ->withInput(
                $request->only('email')
            );
    }


    // Logout user
    public function logout(Request $request)
    {
        Auth::logout();

        // Destroy current session
        $request->session()->invalidate();

        // Generate fresh CSRF token
        $request->session()->regenerateToken();

        return redirect('/login')
            ->with(
                'success',
                'You have been logged out successfully.'
            );
    }
}