<?php

namespace App\Http\Controllers;

use App\Models\Technician;
use Illuminate\Http\Request;

class AdminTechnicianController extends Controller
{
    // Show all technicians
    public function index()
    {
        $technicians = Technician::latest()->get();

        return view('admin.technicians.index', compact('technicians'));
    }

    // Show add form
    public function create()
    {
        return view('admin.technicians.create');
    }

    // Store technician
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

        $validated['available'] = $request->has('available');

        Technician::create($validated);

        return redirect('/admin/technicians')
            ->with('success', 'Technician added successfully.');
    }

    // Show edit form
    public function edit($id)
    {
        $technician = Technician::findOrFail($id);

        return view('admin.technicians.edit', compact('technician'));
    }

    // Update technician
    public function update(Request $request, $id)
    {
        $technician = Technician::findOrFail($id);

        $validated = $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|email|unique:technicians,email,' . $id,
            'phone' => 'nullable|string|max:20',
            'specialization' => 'required|string|max:255',
            'experience' => 'nullable|string',
            'rating' => 'nullable|numeric|min:0|max:5',
            'available' => 'nullable|boolean',
        ]);

        $validated['available'] = $request->has('available');

        $technician->update($validated);

        return redirect('/admin/technicians')
            ->with('success', 'Technician updated successfully.');
    }

    // Delete technician
    public function destroy($id)
    {
        $technician = Technician::findOrFail($id);

        $technician->delete();

        return redirect('/admin/technicians')
            ->with('success', 'Technician deleted successfully.');
    }
}