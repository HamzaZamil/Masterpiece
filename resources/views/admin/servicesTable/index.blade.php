@extends('admin.source.template')

@section('content')

<main id="main" class="main">

    <div class="pagetitle">
        <h1>Services</h1>
        <nav>
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="/">Home</a></li>
                <li class="breadcrumb-item active">Services Table</li>
            </ol>
        </nav>
    </div><!-- End Page Title -->

    <section class="section">
        <div class="row">
            <div class="col-lg-12">

                <div class="card">
                    <div class="card-body">

                        <h2 class="text-center mb-4">Services Table</h2>

                        <!-- Add Service Button -->
                        <div class="text-end mb-3">
                          <button class="btn btn-success" onclick="location.href = '{{Route('admin.services.addService')}}'">
                            <i class="bi bi-plus-circle"></i> Add Service
                          </button>
                        </div>

                        <!-- Services Table -->
                        <div class="table-responsive">
                            <table class="table table-striped table-hover">
                                <thead class="table-dark">
                                    <tr>
                                        <th>#</th>
                                        <th>Service Name</th>
                                        <th>Category</th>
                                        <th>Price</th>
                                        <th>Description</th>
                                        <th>Actions</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <tr>
                                        <td>1</td>
                                        <td>Dog Grooming</td>
                                        <td>Pets</td>
                                        <td>$50</td>
                                        <td>Complete grooming service for dogs.</td>
                                        <td>
                                            <button class="btn btn-primary btn-sm"><i class="bi bi-pencil-square"></i> Edit</button>
                                            <button class="btn btn-danger btn-sm"><i class="bi bi-trash"></i> Delete</button>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td>2</td>
                                        <td>Cat Sitting</td>
                                        <td>Pets</td>
                                        <td>$30</td>
                                        <td>Daytime sitting service for cats.</td>
                                        <td>
                                            <button class="btn btn-primary btn-sm"><i class="bi bi-pencil-square"></i> Edit</button>
                                            <button class="btn btn-danger btn-sm"><i class="bi bi-trash"></i> Delete</button>
                                        </td>
                                    </tr>
                                    <!-- Add more service rows dynamically if needed -->
                                </tbody>
                            </table>
                        </div>

                    </div>
                </div>

            </div>
        </div>
    </section>

</main><!-- End #main -->

@endsection
