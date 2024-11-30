@extends('admin.source.template')

@section('content')

<main id="main" class="main">

    <div class="pagetitle">
        <h1>Edit User</h1>
        <nav>
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="/">Home</a></li>
                <li class="breadcrumb-item active">Edit User</li>
            </ol>
        </nav>
    </div><!-- End Page Title -->

    <section class="section">
        <div class="row">
            <div class="col-lg-12">

                <div class="card">
                    <div class="card-body">

                        <h2 class="text-center mb-4">Edit User</h2>

                        <form action="{{route('admin.users.updateUser', $user->id)}}" method="POST" class="p-4">
                            @csrf
                            @method('PUT')
                            <div class="row mb-3">
                                <div class="col-md-6">
                                    <label for="name" class="form-label">First Name</label>
                                    <input type="text" class="form-control" id="name" name="name" value="{{ old('name', $user->name) }}" required>
                                    @error('name')
                                        <span style="color:red;">{{$message}}</span>
                                    @enderror
                                </div>
                                <div class="col-md-6">
                                    <label for="last_name" class="form-label">Last Name</label>
                                    <input type="text" class="form-control" id="last_name" name="last_name" value="{{ old('last_name', $user->last_name) }}" required>
                                    @error('last_name')
                                        <span style="color:red;">{{ $message }}</span>
                                    @enderror
                                </div>
                            </div>
                        
                            <div class="row mb-3">
                                <div class="col-md-6">
                                    <label for="email" class="form-label">Email</label>
                                    <input type="email" class="form-control" id="email" name="email" value="{{ old('email', $user->email) }}" required>
                                    @error('email')
                                        <span style="color:red;">{{$message}}</span>
                                    @enderror
                                </div>
                                <div class="col-md-6">
                                    <label for="phone_number" class="form-label">Phone</label>
                                    <input type="text" class="form-control" id="phone_number" name="phone_number" value="{{ old('phone_number', $user->phone_number) }}" required>
                                    @error('phone_number')
                                        <span style="color:red;">{{$message}}</span>
                                    @enderror
                                </div>
                            </div>
                        
                            <div class="row mb-3">
                                <div class="col-md-6">
                                    <label for="password" class="form-label">Password</label>
                                    <input type="password" class="form-control" id="password" name="password" placeholder="Enter new password (leave blank to keep current)">
                                    @error('password')
                                        <span style="color:red;">{{$message}}</span>
                                    @enderror
                                </div>
                                <div class="col-md-6">
                                    <label for="gender" class="form-label">Gender</label>
                                    <div>
                                        <input type="radio" id="male" name="gender" value="male" {{ old('gender', $user->gender) == 'male' ? 'checked' : '' }} required>
                                        <label for="male">Male</label>
                                        <input type="radio" id="female" name="gender" value="female" {{ old('gender', $user->gender) == 'female' ? 'checked' : '' }} required>
                                        <label for="female">Female</label>
                                    </div>
                                    @error('gender')
                                        <span style="color:red;">{{$message}}</span>
                                    @enderror
                                </div>
                            </div>
                        
                            <div class="row mb-3">
                                <div class="col-md-12">
                                    <label for="address" class="form-label">Address</label>
                                    <input type="text" class="form-control" id="address" name="address" value="{{ old('address', $user->address) }}">
                                    @error('address')
                                        <span style="color:red;">{{$message}}</span>
                                    @enderror
                                </div>
                            </div>
                        
                            <div class="row mb-3">
                                <div class="col-md-12">
                                    <label for="role" class="form-label">Role</label>
                                    <select class="form-control" id="role" name="role" required>
                                        <option value="" disabled>Select Role</option>
                                        <option value="vet" {{ old('role', $user->role) == 'vet' ? 'selected' : '' }}>Vet</option>
                                        <option value="user" {{ old('role', $user->role) == 'user' ? 'selected' : '' }}>User</option>
                                    </select>
                                    @error('role')
                                        <span style="color:red;">{{$message}}</span>
                                    @enderror
                                </div>
                            </div>
                        
                            <div class="text-center">
                                <button type="submit" class="btn btn-primary px-5">Save Changes</button>
                                <a href="{{ route('admin.users.index') }}" class="btn btn-secondary px-5">Cancel</a>
                            </div>
                        </form>

                    </div>
                </div>

            </div>
        </div>
    </section>

</main><!-- End #main -->

@endsection
