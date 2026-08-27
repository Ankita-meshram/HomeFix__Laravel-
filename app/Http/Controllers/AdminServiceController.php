<?php

namespace App\Http\Controllers;

use App\Models\Service;
use Illuminate\Http\Request;

class AdminServiceController extends Controller
{
    // Show all services
    public function index()
    {
        $services = Service::latest()->get();

        return view('admin.services.index', compact('services'));
    }

    // Show add service form
    public function create()
    {
        return view('admin.services.create');
    }

    // Store service
    public function store(Request $request)
    {
        $validated = $request->validate([
            'name' => 'required|string|max:255',
            'description' => 'required|string',
            'price' => 'required|numeric|min:0',
            'image' => 'nullable|string|max:255',
            'status' => 'nullable|boolean',
        ]);

        $validated['status'] = $request->has('status');

        Service::create($validated);

        return redirect('/admin/services')
            ->with('success', 'Service added successfully.');
    }

    // Show edit form
    public function edit($id)
    {
        $service = Service::findOrFail($id);

        return view('admin.services.edit', compact('service'));
    }

    // Update service
    public function update(Request $request, $id)
    {
        $service = Service::findOrFail($id);

        $validated = $request->validate([
            'name' => 'required|string|max:255',
            'description' => 'required|string',
            'price' => 'required|numeric|min:0',
            'image' => 'nullable|string|max:255',
            'status' => 'nullable|boolean',
        ]);

        $validated['status'] = $request->has('status');

        $service->update($validated);

        return redirect('/admin/services')
            ->with('success', 'Service updated successfully.');
    }

    // Delete service
    public function destroy($id)
    {
        $service = Service::findOrFail($id);

        $service->delete();

        return redirect('/admin/services')
            ->with('success', 'Service deleted successfully.');
    }
}