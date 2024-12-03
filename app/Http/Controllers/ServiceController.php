<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Service;
use App\Models\Category;

class ServiceController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $services = Service::all();
        return view('admin.servicesTable.index', compact('services'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $categories = Category::all(['category_id', 'category_name']);
        return view('admin.servicesTable.create', compact('categories'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
{
    // Validate the request data
    $validatedData = $request->validate([
        'service_name' => 'required|string|max:255',
        'service_description' => 'nullable|string|max:1000',
        'service_price' => 'required|numeric|min:0', // Ensure price is a positive number
        'service_duration' => 'required|integer|min:1', // Ensure duration is a positive integer
    ]);

    // Create a new service record using the validated data
    Service::create($validatedData);

    // Redirect to the services index page with a success message
    return redirect()->route('admin.services.index')->with('success', 'Service added successfully!');
}

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        $data = Service::all();
        return view('admin.servicesTable.show', compact('data'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $service = Service::findOrFail($id);
        return view('admin.servicesTable.update', compact('service'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
{
    // Validate the request data
    $validatedData = $request->validate([
        'service_name' => 'required|string|max:255',
        'service_description' => 'nullable|string|max:1000',
        'service_price' => 'required|numeric|min:0', // Ensure price is a positive number
        'service_duration' => 'required|integer|min:1', // Ensure duration is a positive integer
    ]);

    // Find the service by ID or fail
    $service = Service::findOrFail($id);

    // Update the service
    $service->update($validatedData);

    // Redirect to the services index page with a success message
    return redirect()->route('admin.services.index')->with('success', 'Service updated successfully!');
}


    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
{
    // Find the service by ID or fail
    $service = Service::findOrFail($id);

    // Delete the service
    $service->delete();

    // Redirect with a success message
    return redirect()->route('admin.services.index')->with('success', 'Service deleted successfully!');
}

}
