@extends('admin.source.template')

@section('content')

<main id="main" class="main">

    <div class="pagetitle">
      <h1>Pets</h1>
      <nav>
        <ol class="breadcrumb">
          <li class="breadcrumb-item"><a href="/">Home</a></li>
          <li class="breadcrumb-item active">Pets Table</li>
        </ol>
      </nav>
    </div><!-- End Page Title -->

    <section class="section">
      <div class="row">
        <div class="col-lg-12">

          <div class="card" >
            <div class="card-body">
              <h5 class="card-title">Pets Table</h5>

              <!-- Add Pet Button -->
              <div class="mb-3 text-end">
                <button class="btn btn-success" onclick="location.href = '{{Route('admin.pets.addPet')}}'">
                  <i class="bi bi-plus-circle"></i> Add Pet
                </button>
              </div>

              <!-- Table with stripped rows -->
              <div class="container mt-5">
                <h2 class="mb-4">Pets Table</h2>
                <div class="table">
                  <table class="table  table-bordered">
                    <thead class="table-dark">
                      <tr>
                        <th>#</th>
                        <th>Pet Picture</th>
                        <th>Pet Name</th>
                        <th>Pet Type</th>
                        <th>Pet Breed</th>
                        <th>Pet Age</th>
                        <th>Pet Weight</th>
                        <th>Pet Gender</th>
                        <th>Actions</th>
                      </tr>
                    </thead>
                    <tbody>
                      @foreach ($data as $pet)
                      <tr>
                          <td>{{ $pet['id']  }}</td>
                          <td>{{ $pet['pet_image'] }}</td>
                          <td>{{ $pet['pet_name'] }}</td>
                          <td>{{ $pet['pet_type'] }}</td>
                          <td>{{ $pet['pet_breed'] }}</td>
                          <td>{{ $pet['pet_age'] }}</td>
                          <td>{{ $pet['pet_weight'] }}</td>
                          <td>{{ $pet['pet_gender'] }}</td>

                          <td>
                              <a href="{{ route('admin.pets.editPet', $pet['id']) }}" class="btn btn-warning">Edit</a>
                              <form action="{{ route('admin.pets.deletePet', $pet['id']) }}" method="POST">
                                  @csrf
                                  @method('DELETE')
                                  <button type="button" class="btn btn-danger" onclick="confirmDelete(this)">Delete</button>
                              </form>
                          </td>
                      </tr>
                  @endforeach
                      <!-- Add more pet rows dynamically from the database as needed -->
                    </tbody>
                  </table>
                </div>
              </div>

            </div>
          </div>

        </div>
      </div>
    </section>

</main><!-- End #main -->

@endsection
