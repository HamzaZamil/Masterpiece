@extends('admin.source.template')

@section('content')

<main id="main" class="main">

    <div class="pagetitle">
        <h1>Appointments</h1>
        <nav>
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="/">Home</a></li>
                <li class="breadcrumb-item active">Appointments Table</li>
            </ol>
        </nav>
    </div><!-- End Page Title -->

    <section class="section">
        <div class="row">
            <div class="col-lg-12">

                <div class="card">
                    <div class="card-body">

                        <h2 class="text-center mb-4">Add Appointment</h2> 

                        <form action="{{ route('admin.appointments.storeAppointment') }}" method="POST" enctype="multipart/form-data" class="p-4">
                            @csrf
                            <div>
                            <!-- Service Selection -->
                            <select class="form-control" id="serviceId" name="service_id" required>
                                <option value="" disabled selected>Select Service</option>
                                @foreach ($services as $service)
                                    <option value="{{ $service->id }}">{{ $service->service_name }}</option>
                                @endforeach
                            </select>
                        </div>
                        <div>
                            <!-- Pet Selection -->
                            <select class="form-control" id="petId" name="pet_id" required>
                                <option value="" disabled selected>Select Pet</option>
                                @foreach ($pets as $pet)
                                    <option value="{{ $pet->id }}">{{ $pet->pet_name }}</option>
                                @endforeach
                            </select>
                        </div>
                            <!-- Appointment Date -->
                            <div class="row mb-3">
                                <div class="col-md-6">
                                    <label for="appointmentDate" class="form-label">Appointment Date</label>
                                    <input type="date" class="form-control" id="appointmentDate" name="appointment_date" required>
                                </div>
                                <!-- Appointment Time -->
                                <div class="col-md-6">
                                    <label for="appointmentTime" class="form-label">Appointment Time</label>
                                    <input type="time" class="form-control" id="appointmentTime" name="appointment_time" required>
                                </div>
                            </div>

                            <!-- Appointment Location -->
                            <div class="row mb-3">
                                <div class="col-md-12">
                                    <label for="appointmentLocation" class="form-label">Appointment Location</label>
                                    <select class="form-control" id="appointmentLocation" name="appointment_location" required>
                                        <option value="" disabled selected>Select Location</option>
                                        <option value="van">Van</option>
                                        <option value="home">Home</option>
                                    </select>
                                </div>
                            </div>

                            <!-- Appointment Status -->
                            <div class="row mb-3">
                                <div class="col-md-12">
                                    <label for="appointmentStatus" class="form-label">Appointment Status</label>
                                    <select class="form-control" id="appointmentStatus" name="appointment_status" required>
                                        <option value="" disabled selected>Select Status</option>
                                        <option value="accepted">Accepted</option>
                                        <option value="pending">Pending</option>
                                        <option value="declined">Declined</option>
                                        <option value="done">Done</option>
                                        <option value="in_progress">In Progress</option>
                                    </select>
                                </div>
                            </div>

                            <div class="text-center">
                                <button type="submit" class="btn btn-primary px-5">Save Changes</button>
                                <a href="/appointments_table" class="btn btn-secondary px-5">Cancel</a>
                            </div>
                        </form>

                    </div>
                </div>

            </div>
        </div>
    </section>

</main><!-- End #main -->

@endsection
