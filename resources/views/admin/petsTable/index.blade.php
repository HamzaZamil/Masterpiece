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
                      <tr>
                        <td>1</td>
                        <td><img src="/images/pets/buddy.jpg" alt="Buddy" class="img-fluid" style="width: 60px; height: 60px; border-radius: 10%;"></td>
                        <td>Buddy</td>
                        <td>Dog</td>
                        <td>Golden Retriever</td>
                        <td>3</td>
                        <td>25</td>
                        <td>Male</td>
                        <td>
                          <button class="btn btn-primary btn-sm">Edit</button>
                          <button class="btn btn-danger btn-sm">Delete</button>
                        </td>
                      </tr>
                      <tr>
                        <td>2</td>
                        <td><img src="/images/pets/kitty.jpg" alt="Kitty" class="img-fluid" style="width: 60px; height: 60px; border-radius: 10%;"></td>
                        <td>Kitty</td>
                        <td>Cat</td>
                        <td>Persian</td>
                        <td>2</td>
                        <td>5</td>
                        <td>Female</td>
                        <td>
                          <button class="btn btn-primary btn-sm">Edit</button>
                          <button class="btn btn-danger btn-sm">Delete</button>
                        </td>
                      </tr>
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
