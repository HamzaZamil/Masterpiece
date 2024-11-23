@extends('admin.source.template')

@section('content')

<main id="main" class="main">

    <div class="pagetitle">
      <h1>Pets</h1>
      <nav>
        <ol class="breadcrumb">
          <li class="breadcrumb-item"><a href="/">Home</a></li>
          <li class="breadcrumb-item active">Edit Pet</li>
        </ol>
      </nav>
    </div><!-- End Page Title -->

    <section class="section">
      <div class="row">
        <div class="col-lg-12">

          <div class="card">
            <div class="card-body">

              <!-- Edit Pet Form -->
              <div class="container mt-5">
                <h2>Edit Pet</h2>
                <form action="{{ route('admin.pets.editPet') }}" method="POST">
                  @csrf
                  <input type="hidden" name="id" value="{{ $pet->id ?? '' }}">
                  
                  <div class="mb-3">
                    <label for="petName" class="form-label">Pet Name</label>
                    <input type="text" class="form-control" id="petName" name="pet_name" value="{{ $pet->pet_name ?? '' }}" required>
                  </div>
                  
                  <div class="mb-3">
                    <label for="petType" class="form-label">Pet Type</label>
                    <select class="form-control" id="petType" name="pet_type" required>
                      <option value="" disabled selected>Select Type</option>
                      <option value="cat" {{ (isset($pet->pet_type) && $pet->pet_type == 'cat') ? 'selected' : '' }}>Cat</option>
                      <option value="dog" {{ (isset($pet->pet_type) && $pet->pet_type == 'dog') ? 'selected' : '' }}>Dog</option>
                    </select>
                  </div>
                  
                  <div class="mb-3">
                    <label for="petBreed" class="form-label">Pet Breed</label>
                    <input type="text" class="form-control" id="petBreed" name="pet_breed" value="{{ $pet->pet_breed ?? '' }}" required>
                  </div>
                  
                  <div class="mb-3">
                    <label for="petAge" class="form-label">Pet Age</label>
                    <input type="number" class="form-control" id="petAge" name="pet_age" value="{{ $pet->pet_age ?? '' }}" required>
                  </div>
                  
                  <div class="mb-3">
                    <label for="petWeight" class="form-label">Pet Weight (kg)</label>
                    <input type="number" class="form-control" id="petWeight" name="pet_weight" value="{{ $pet->pet_weight ?? '' }}" required>
                  </div>
                  
                  <div class="mb-3">
                    <label for="petGender" class="form-label">Pet Gender</label>
                    <select class="form-control" id="petGender" name="pet_gender" required>
                      <option value="" disabled selected>Select Gender</option>
                      <option value="male" {{ (isset($pet->pet_gender) && $pet->pet_gender == 'male') ? 'selected' : '' }}>Male</option>
                      <option value="female" {{ (isset($pet->pet_gender) && $pet->pet_gender == 'female') ? 'selected' : '' }}>Female</option>
                    </select>
                  </div>
                  
                  <div class="mb-3">
                    <label for="petMedicalHistory" class="form-label">Medical History</label>
                    <textarea class="form-control" id="petMedicalHistory" name="pet_medical_history" rows="4">{{ $pet->pet_medical_history ?? '' }}</textarea>
                  </div>
                  
                  <button type="submit" class="btn btn-primary">Save Changes</button>
                  <a href="{{ route('admin.pets.index') }}" class="btn btn-secondary">Cancel</a>
                </form>
              </div>

            </div>
          </div>

        </div>
      </div>
    </section>

</main><!-- End #main -->

@endsection
