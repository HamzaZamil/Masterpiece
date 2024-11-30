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
                <div class="table-responsive">
                  <table class="table  table-bordered">
                    <thead class="table-dark">
                      <tr>
                        <th scope="col">Pet Name</th>
                        <th scope="col">Pet Type</th>
                        <th scope="col">Pet Breed</th>
                        <th scope="col">Pet Gender</th>
                        <th scope="col">Actions</th>
                      </tr>
                    </thead>
                    <tbody>
                      @foreach ($data as $pet)
                      <tr>
                          <td>{{ $pet['pet_name'] }}</td>
                          <td>{{ $pet['pet_type'] }}</td>
                          <td>{{ $pet['pet_breed'] }}</td>
                          <td>{{ $pet['pet_gender'] }}</td>

                          <td class="d-flex">
                              <a href="{{ route('admin.pets.editPet', $pet['id']) }}" class="btn btn-warning"><i class="bi bi-pencil-square "></i></a>
                              <a href="{{ route('admin.pets.showPet', $pet['id']) }}" class="btn btn-info "><i class="bi bi-eye"></i></a>
                              <form action="{{ route('admin.pets.deletePet', $pet['id']) }}" method="POST">
                                  @csrf
                                  @method('DELETE')
                                  <button type="button" class="btn btn-danger" onclick="confirmDelete(this)"><i class="bi bi-trash3-fill"></i></button>
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
