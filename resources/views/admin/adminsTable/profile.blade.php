@extends('admin.source.template')

@section('content')

<main id="main" class="main">

<div class="pagetitle">
  <h1>Profile</h1>
  <nav>
    <ol class="breadcrumb">
      <li class="breadcrumb-item"><a href="#">Home</a></li>
      <li class="breadcrumb-item active">Profile</li>
    </ol>
  </nav>
</div><!-- End Page Title -->

<section class="section profile">
  <div class="row">
    <div class="col-xl-4">

      <div class="card">
        <div class="card-body profile-card pt-4 d-flex flex-column align-items-center">

          <img src="{{asset('assets/user/images/main-thumb/profile-icon.png')}}" alt="Profile" class="rounded-circle">
          {{-- <i class="bi bi-person-circle" style="height: 150px; width:150px"></i> --}}
          <h2>{{$user->name}}</h2>
          
        </div>
      </div>

    </div>

    <div class="col-xl-8">

      <div class="card">
        <div class="card-body pt-3">
          <!-- Bordered Tabs -->
          <ul class="nav nav-tabs nav-tabs-bordered">

            <li class="nav-item">
              <button class="nav-link active" data-bs-toggle="tab" data-bs-target="#profile-overview">Overview</button>
            </li>

            <li class="nav-item">
              <button class="nav-link" data-bs-toggle="tab" data-bs-target="#profile-edit">Edit Profile</button>
            </li>

          

            

          </ul>
          <div class="tab-content pt-2">

            <div class="tab-pane fade show active profile-overview" id="profile-overview" >
              <h5 class="card-title">Welcome to pettie Admin Dashboard</h5>

              <h5 class="card-title">Profile Details</h5>

              <div class="row">
                <div class="col-lg-3 col-md-4 label ">Full Name</div>
                <div class="col-lg-9 col-md-8">{{$user->name}} {{$user->last_name}}</div>
              </div>

              <div class="row">
                <div class="col-lg-3 col-md-4 label">Email</div>
                <div class="col-lg-9 col-md-8">{{$user->email}}</div>
              </div>

              <div class="row">
                <div class="col-lg-3 col-md-4 label">Phone Number </div>
                <div class="col-lg-9 col-md-8">{{$user->phone_number}}</div>
              </div>

              <div class="row">
                <div class="col-lg-3 col-md-4 label">City</div>
                <div class="col-lg-9 col-md-8">{{$user->city}}</div>
              </div>

              

            </div>

            <div class="tab-pane fade profile-edit pt-3" id="profile-edit">

              <!-- Profile Edit Form -->
              @if (session('success'))
              <div class="alert alert-success">{{ session('success') }}</div>
              @endif

              <form action="{{ route('profile.update') }}" method="POST">
                @csrf
                @method('PUT')
        
              
        
                <!-- First Name -->
                <div class="mb-3">
                    <label for="name" class="form-label">First Name</label>
                    <input type="text" id="name" name="name" class="form-control" value="{{ old('name', $user->name) }}" required>
                    @error('name')
                        <span class="text-danger">{{ $message }}</span>
                    @enderror
                </div>
        
                <!-- Last Name -->
                <div class="mb-3">
                    <label for="last_name" class="form-label">Last Name</label>
                    <input type="text" id="last_name" name="last_name" class="form-control" value="{{ old('last_name', $user->last_name) }}" required>
                    @error('last_name')
                        <span class="text-danger">{{ $message }}</span>
                    @enderror
                </div>
        
                <!-- Phone Number -->
                <div class="mb-3">
                    <label for="phone_number" class="form-label">Phone Number</label>
                    <input type="tel" id="phone_number" name="phone_number" class="form-control" value="{{ old('phone_number', $user->phone_number) }}" required>
                    @error('phone_number')
                        <span class="text-danger">{{ $message }}</span>
                    @enderror
                </div>
        
                <!-- Email -->
                <div class="mb-3">
                    <label for="email" class="form-label">Email</label>
                    <input type="email" id="email" name="email" class="form-control" value="{{ old('email', $user->email) }}" readonly disabled>
                </div>
        
                <!-- Submit Button -->
                <div class="text-center">
                    <button type="submit" class="btn btn-primary">Update Profile</button>
                </div>
            </form>

            </div>

           

          </div><!-- End Bordered Tabs -->

        </div>
      </div>

    </div>
  </div>
</section>

</main><!-- End #main -->

@endsection