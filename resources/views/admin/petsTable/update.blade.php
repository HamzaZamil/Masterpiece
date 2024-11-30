@extends('admin.source.template')

@section('content')

<main id="main" class="main">

    <div class="pagetitle">
        <h1>Edit Pet</h1>
        <nav>
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="/">Home</a></li>
                <li class="breadcrumb-item"><a href="{{ route('admin.pets.index') }}">Pets Table</a></li>
                <li class="breadcrumb-item active">Edit Pet</li>
            </ol>
        </nav>
    </div><!-- End Page Title -->

    <section class="section">
        <div class="row">
            <div class="col-lg-8">

                <div class="card">
                    <div class="card-body">
                        <h5 class="card-title">Edit Pet</h5>

                        <!-- Pet Edit Form -->
                        <form action="{{ route('admin.pets.updatePet', $pet['id']) }}" method="POST" enctype="multipart/form-data">
                            @csrf
                            @method('PATCH')

                            <div class="mb-3">
                                <label for="pet_name" class="form-label">Pet Name</label>
                                <input type="text" class="form-control" id="pet_name" name="pet_name" value="{{ $pet['pet_name'] }}" required>
                            </div>

                            <div class="mb-3">
                                <label for="pet_type" class="form-label">Pet Type</label>
                                <select class="form-control" id="pet_type" name="pet_type" required>
                                    <option value="Dog" {{ $pet['pet_type'] == 'Dog' ? 'selected' : '' }}>Dog</option>
                                    <option value="Cat" {{ $pet['pet_type'] == 'Cat' ? 'selected' : '' }}>Cat</option>
                                </select>
                            </div>

                            <div class="mb-3">
                                <label for="pet_breed" class="form-label">Pet Breed</label>
                                <input type="text" class="form-control" id="pet_breed" name="pet_breed" value="{{ $pet['pet_breed'] }}" required>
                            </div>

                            <div class="mb-3">
                                <label for="pet_age" class="form-label">Pet Age (in years)</label>
                                <input type="number" class="form-control" id="pet_age" name="pet_age" value="{{ $pet['pet_age'] }}" required>
                            </div>

                            <div class="mb-3">
                                <label for="pet_weight" class="form-label">Pet Weight (in kg)</label>
                                <input type="number" class="form-control" id="pet_weight" name="pet_weight" step="0.1" value="{{ $pet['pet_weight'] }}" required>
                            </div>

                            <div class="mb-3">
                                <label for="pet_gender" class="form-label">Pet Gender</label>
                                <select class="form-control" id="pet_gender" name="pet_gender" required>
                                    <option value="Male" {{ $pet['pet_gender'] == 'Male' ? 'selected' : '' }}>Male</option>
                                    <option value="Female" {{ $pet['pet_gender'] == 'Female' ? 'selected' : '' }}>Female</option>
                                </select>
                            </div>

                            <div class="mb-3">
                                <label for="pet_medical_history" class="form-label">Pet Medical History</label>
                                <textarea class="form-control" id="pet_medical_history" name="pet_medical_history" value="{{ $pet['pet_medical_history'] }}" rows="4"></textarea>       
                            </div>

                            <div class="mb-3">
                                <label for="pet_image" class="form-label">Pet Picture</label>
                                <input type="file" class="form-control" id="pet_image" name="pet_image">
                                @if($pet['pet_image'])
                                    <img src="{{ asset('storage/pets/' . $pet['pet_image']) }}" alt="Pet Picture" class="mt-2" style="width: 150px; height: auto;">
                                @endif
                            </div>

                            <div class="text-end">
                                <button type="submit" class="btn btn-primary">Save Changes</button>
                                <a href="{{ route('admin.pets.index') }}" class="btn btn-secondary">Cancel</a>
                            </div>
                        </form>

                    </div>
                </div>

            </div>
        </div>
    </section>

</main><!-- End #main -->

@endsection
