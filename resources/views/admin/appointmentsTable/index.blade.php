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
                        <h5 class="card-title">Appointments Table</h5>

                        <!-- Add Category Button -->
                        <div class="mb-3 text-end">
                            <form action="{{Route('admin.appointments.addAppointment')}}" method="POST">
                                @csrf
                                @method('get')
                            <button class="btn btn-success">
                                <i class="bi bi-plus-circle"></i> Add Appointment
                            </button>
                        </form>
                        </div>

                        <!-- Table with stripped rows -->
                        <div class="table">
                            <table class="table table-bordered">
                                <thead class="table-dark">
                                    <tr>
                                        <th>#</th>
                                        <th>User Name</th>
                                        <th>Service Name</th>
                                        <th>Appointment Date</th>
                                        <th>Appointment Time</th>
                                        <th>Appointment Status</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($appointments as $appointment)
                                        <tr>
                                            <td>{{ $appointment['appointment_id'] }}</td>
                                            <td>{{ $appointment['user_name'] }}</td>
                                            <td>{{ $appointment['service_name'] }}</td>
                                            <td>{{ $appointment['appointment_date'] }}</td>
                                            <td>{{ $appointment['appointment_time'] }}</td>
                                            <td>{{ ucfirst($appointment['appointment_status']) }}</td>
                                        </tr>
                                    @endforeach
                                </tbody>
                            </table>
                            <!-- End Table -->
                        </div>

                    </div>
                </div>

            </div>
        </div>
    </section>

</main><!-- End #main -->

@endsection
  