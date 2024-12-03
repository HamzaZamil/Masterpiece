<?php

namespace App\Http\Controllers;

use App\Models\Appointment;
use App\Models\Pet;
use App\Models\User;
use App\Models\Service;
use Illuminate\Http\Request;

class AppointmentController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
{
    // Fetch appointments with relationships to user, service, and pet
    $appointments = Appointment::with(['user:id,name', 'service:id,service_name', 'pet:id,pet_name'])->get();  // <-- Added pet relationship

    // Transform the data to include only the relevant fields
    $appointmentsData = $appointments->map(function ($appointment) {
        return [
            'appointment_id' => $appointment->appointment_id,
            'user_name' => $appointment->user->name ?? 'N/A',
            'service_name' => $appointment->service->service_name ?? 'N/A',
            'pet_name' => $appointment->pet->pet_name ?? 'N/A',  // <-- Corrected pet_name reference
            'appointment_date' => $appointment->appointment_date,
            'appointment_time' => $appointment->appointment_time,
            'appointment_status' => $appointment->appointment_status,
        ];
    });

    // Return the data (or pass to a view, API, etc.)
    return view('admin.appointmentsTable.index', ['appointments' => $appointmentsData]);
}

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $services = Service::all(['id', 'service_name']);
        $pets = Pet::all(['id', 'pet_name']);
        $users = User::all(['id', 'name']);
        return view('admin.appointmentsTable.create', compact('users', 'pets', 'services'));

    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        // dd($request);
        $validated = $request->validate([
            'user_id' => 'required|exists:users,id',
            'service_id' => 'required|exists:services,id',
            'pet_id' => 'required|exists:pets,id',
            'appointment_date' => 'required|date',
            'appointment_time' => 'required',
            'appointment_location' => 'required|in:van,home',
            'appointment_status' => 'required|in:accepted,pending,declined,done,in_progress',
        ]);
        Appointment::create($validated);

        return redirect()->route('admin.appointments.index')->with('success', 'Appointment added successfully!');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        $data = Appointment::all();
        return view('admin.appointmentsTable.show', compact('data'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $appointment = Appointment::findOrFail($id);
        return view('admin.appointmentsTable.update', compact('appointment'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
{
    // Validate the request data
    $validatedData = $request->validate([
        'user_id' => 'required|exists:users,id', // Ensure the user exists
        'service_id' => 'required|exists:services,id', // Ensure the service exists
        'pet_id' => 'required|exists:pets,id', // Ensure the pet exists
        'appointment_date' => 'required|date|after_or_equal:today', // Validate that the date is today or in the future
        'appointment_time' => 'required|date_format:H:i', // Ensure valid time format (HH:mm)
        'appointment_location' => 'nullable|string|max:255', // Location is optional, but if provided, must be a string
        'appointment_status' => 'required|in:accepted,pending,declined,done,in_progress', // Ensure the status is one of the valid options
    ]);

    // Find the appointment by ID or fail
    $appointment = Appointment::findOrFail($id);

    // Update the appointment
    $appointment->update($validatedData);

    // Redirect to the appointments index page with a success message
    return redirect()->route('admin.appointments.index')->with('success', 'Appointment updated successfully!');
}


    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
