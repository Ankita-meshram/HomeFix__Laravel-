<?php

namespace App\Http\Controllers;

use App\Models\Technician;
use Illuminate\Http\Request;

class TechnicianController extends Controller
{
    // Get all available technicians
    public function index()
    {
        $technicians = Technician::where('available', true)
            ->latest()
            ->get();

        return response()->json($technicians);
    }

    // Get single technician
    public function show($id)
    {
        $technician = Technician::findOrFail($id);

        return response()->json($technician);
    }

    // Create technician
    public function store(Request $request)
    {
        $validated = $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|email|unique:technicians,email',
            'phone' => 'nullable|string|max:20',
            'specialization' => 'required|string|max:255',
            'experience' => 'nullable|string',
            'rating' => 'nullable|numeric|min:0|max:5',
            'available' => 'nullable|boolean',
        ]);

        $technician = Technician::create($validated);

        return response()->json([
            'message' => 'Technician created successfully.',
            'technician' => $technician
        ], 201);
    }

    // Update technician
    public function update(Request $request, $id)
    {
        $technician = Technician::findOrFail($id);

        $validated = $request->validate([
            'name' => 'sometimes|required|string|max:255',
            'email' => 'sometimes|required|email|unique:technicians,email,' . $id,
            'phone' => 'nullable|string|max:20',
            'specialization' => 'sometimes|required|string|max:255',
            'experience' => 'nullable|string',
            'rating' => 'nullable|numeric|min:0|max:5',
            'available' => 'nullable|boolean',
        ]);

        $technician->update($validated);

        return response()->json([
            'message' => 'Technician updated successfully.',
            'technician' => $technician
        ]);
    }

    // Delete technician
    public function destroy($id)
    {
        $technician = Technician::findOrFail($id);

        $technician->delete();

        return response()->json([
            'message' => 'Technician deleted successfully.'
        ]);
    }
}