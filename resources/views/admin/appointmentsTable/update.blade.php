@extends('admin.source.template')

@section('content')

<main id="main" class="main">


<form action="{{ route('admin.appointments.update', $appointment['id']) }}" method="POST">
    @csrf
    @method('PATCH')

    <div class="mb-3">
        <label for="user_id" class="form-label">User</label>
        <select class="form-control" id="user_id" name="user_id" required>
            <option value="">Select User</option>
            @foreach ($users as $user)
                <option value="{{ $user->id }}" {{ $user->id == $appointment->user_id ? 'selected' : '' }}>
                    {{ $user->name }}
                </option>
            @endforeach
        </select>
    </div>

    <div class="mb-3">
        <label for="service_id" class="form-label">Service</label>
        <select class="form-control" id="service_id" name="service_id" required>
            <option value="">Select Service</option>
            @foreach ($services as $service)
                <option value="{{ $service->id }}" {{ $service->id == $appointment->service_id ? 'selected' : '' }}>
                    {{ $service->service_name }}
                </option>
            @endforeach
        </select>
    </div>

    <div class="mb-3">
        <label for="pet_id" class="form-label">Pet</label>
        <select class="form-control" id="pet_id" name="pet_id" required>
            <option value="">Select Pet</option>
            @foreach ($pets as $pet)
                <option value="{{ $pet->id }}" {{ $pet->id == $appointment->pet_id ? 'selected' : '' }}>
                    {{ $pet->pet_name }}
                </option>
            @endforeach
        </select>
    </div>

    <div class="mb-3">
        <label for="appointment_date" class="form-label">Appointment Date</label>
        <input type="date" class="form-control" id="appointment_date" name="appointment_date" value="{{ $appointment->appointment_date }}" required>
    </div>

    <div class="mb-3">
        <label for="appointment_time" class="form-label">Appointment Time</label>
        <input type="time" class="form-control" id="appointment_time" name="appointment_time" value="{{ $appointment->appointment_time }}" required>
    </div>

    <div class="mb-3">
        <label for="appointment_location" class="form-label">Location</label>
        <input type="text" class="form-control" id="appointment_location" name="appointment_location" value="{{ $appointment->appointment_location }}">
    </div>

    <div class="mb-3">
        <label for="appointment_status" class="form-label">Appointment Status</label>
        <select class="form-control" id="appointment_status" name="appointment_status" required>
            <option value="accepted" {{ $appointment->appointment_status == 'accepted' ? 'selected' : '' }}>Accepted</option>
            <option value="pending" {{ $appointment->appointment_status == 'pending' ? 'selected' : '' }}>Pending</option>
            <option value="declined" {{ $appointment->appointment_status == 'declined' ? 'selected' : '' }}>Declined</option>
            <option value="done" {{ $appointment->appointment_status == 'done' ? 'selected' : '' }}>Done</option>
            <option value="in_progress" {{ $appointment->appointment_status == 'in_progress' ? 'selected' : '' }}>In progress</option>
        </select>
    </div>

    <div class="text-end">
        <button type="submit" class="btn btn-primary">Save Changes</button>
        <a href="{{ route('admin.appointments.index') }}" class="btn btn-secondary">Cancel</a>
    </div>
</form>

</main>

@endsection