@extends('admin.source.template')

@section('content')


<main id="main" class="main">

    <div class="pagetitle">
      <h1>Contact Us</h1>
      <nav>
        <ol class="breadcrumb">
          <li class="breadcrumb-item"><a href="/">Home</a></li>
          <li class="breadcrumb-item active">ContactUs Table</li>
        </ol>
      </nav>
    </div><!-- End Page Title -->

    <section class="section">
      <div class="row">
        <div class="col-lg-12">

          <div class="card">
            <div class="card-body">
              <h5 class="card-title">Booking Table</h5>
              
              <!-- Table with stripped rows -->
              <div class="container mt-5" >
  <h2 class="mb-4" >Users Table</h2>
  <div class="table-container">
  <table class="table table-striped table-bordered">
    <thead class="table-dark">
      <tr>
        <th>#</th>
        <th>First Name</th>
        <th>Last Name</th>
        <th>Email</th>
        <th>Phone</th>
        <th>Actions</th>
      </tr>
    </thead>
    <tbody>
      <tr>
        <td>1</td>
        <td>John</td>
        <td>Doe</td>
        <td>john.doe@example.com</td>
        <td>+1234567890</td>
        <td>
          <button class="btn btn-primary btn-sm">Edit</button>
          <button class="btn btn-danger btn-sm">Delete</button>
        </td>
      </tr>
      <tr>
        <td>2</td>
        <td>Jane</td>
        <td>Smith</td>
        <td>jane.smith@example.com</td>
        <td>+0987654321</td>
        <td>
          <button class="btn btn-primary btn-sm">Edit</button>
          <button class="btn btn-danger btn-sm">Delete</button>
        </td>
      </tr>
      <!-- Add more user rows as needed -->
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