@extends('admin.source.template')

@section('content')

<main id="main" class="main">

    <div class="pagetitle">
        <h1>Add New Pet</h1>
        <nav>
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="/">Home</a></li>
                <li class="breadcrumb-item active">Add Pet</li>
            </ol>
        </nav>
    </div><!-- End Page Title -->

    <section class="section">
        <div class="row">
            <div class="col-lg-12">

                <div class="card">
                    <div class="card-body">

                        <h2 class="text-center mb-4">Add New Pet</h2>

                        <form action="{{ route('admin.pets.storePet') }}" method="POST" enctype="multipart/form-data" class="p-4">
                            @csrf

                            <div>
                                <!-- user Selection -->
                                <select class="form-control" id="userId" name="user_id" required>
                                    <option value="" disabled selected>Select user</option>
                                    @foreach ($users as $user)
                                        <option value="{{ $user->id }}">{{ $user->id }}</option>
                                    @endforeach
                                </select>
                            </div>

                            <div class="row mb-3">
                                <div class="col-md-6">
                                    <label for="pet_name" class="form-label">Pet Name</label>
                                    <input type="text" class="form-control" id="pet_name" name="pet_name" value="{{old('pet_name')}}" required>
                                </div>
                                <div class="col-md-6">
                                    <label for="pet_age" class="form-label">Pet Age</label>
                                    <input type="number" class="form-control" id="pet_age" name="pet_age" value="{{old('pet_age')}}" required>
                                </div>  
                            </div>

                            <div class="row mb-3">
                                <div class="col-md-6">
                                    <label for="pet_breed" class="form-label">Pet Breed</label>
                                    <input type="text" class="form-control" id="pet_breed" name="pet_breed" value="{{old('pet_breed')}}" required>
                                </div>
                                <div class="col-md-6">
                                    <label for="pet_type" class="form-label">Select Pet</label>
                                    <div>
                                        <input type="radio" id="cat" name="pet_type" value="cat" required>
                                        <label for="cat">Cat</label>
                                        <input type="radio" id="dog" name="pet_type" value="dog" required>
                                        <label for="dog">Dog</label>
                                    </div>
                                    @error('pet_type')
                                        <span style="color:red;">{{$message}}</span>
                                    @enderror
                                </div>
                                
                            </div>

                            <div class="row mb-3">
                                <div class="col-md-6">
                                    <label for="pet_weight" class="form-label">Pet Weight (kg)</label>
                                    <input type="number" class="form-control" id="pet_weight" name="pet_weight" value="{{old('pet_weight')}}" required>
                                </div>
                                <div class="col-md-6">
                                    <label for="pet_gender" class="form-label">Gender</label>
                                    <div>
                                        <input type="radio" id="male" name="pet_gender" value="male" required>
                                        <label for="male">Male</label>
                                        <input type="radio" id="female" name="pet_gender" value="female" required>
                                        <label for="female">Female</label>
                                    </div>
                                    @error('pet_gender')
                                        <span style="color:red;">{{$message}}</span>
                                    @enderror
                                </div>
                            </div>

                            <div class="row mb-3">
                                <div class="col-md-12">
                                    <label for="pet_medical_history" class="form-label">Medical History</label>
                                    <textarea class="form-control" id="pet_medical_history" name="pet_medical_history" rows="4">{{ $pet->pet_medical_history ?? '' }}</textarea>
                                </div>
                            </div>

                            <div class="row mb-3">
                                <div class="col-md-12">
                                    <label for="pet_image" class="form-label">Pet Picture</label>
                                    <input type="file" class="form-control" id="v" name="pet_image" accept="image/*" required>
                                </div>
                            </div>

                            <div class="text-center">
                                <button type="submit" class="btn btn-primary px-5">Save Changes</button>
                                <a href="{{ route('admin.pets.index') }}" class="btn btn-secondary px-5">Cancel</a>
                            </div>
                        </form>

                    </div>
                </div>

            </div>
        </div>
    </section>

</main><!-- End #main -->

@endsection
