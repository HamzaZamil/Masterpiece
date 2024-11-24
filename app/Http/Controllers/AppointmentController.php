<?php

namespace App\Http\Controllers;

use App\Models\Appointment;
use App\Models\Pet;
use App\Models\Service;
use Illuminate\Http\Request;

class AppointmentController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {

        $appointments = Appointment::with(['user:id,name', 'service:id,service_name'])->get();

        // Transform the data to include only the relevant fields
        $appointmentsData = $appointments->map(function ($appointment) {
            return [
                'appointment_id' => $appointment->appointment_id,
                'user_name' => $appointment->user->name ?? 'N/A',
                'service_name' => $appointment->service->service_name ?? 'N/A',
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
        return view('admin.appointmentsTable.create', compact('services', 'pets'));

    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        // dd($request);
        $validated = $request->validate([
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
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
