@extends('admin.source.template')

@section('content')

<main id="main" class="main">

    <div class="pagetitle">
        <h1>Categories</h1>
        <nav>
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="/">Home</a></li>
                <li class="breadcrumb-item active">Categories Table</li>
            </ol>
        </nav>
    </div><!-- End Page Title -->

    <section class="section">
        <div class="row">
            <div class="col-lg-12">

                <div class="card">
                    <div class="card-body">
                        <h5 class="card-title">Categories Table</h5>

                        <!-- Add Category Button -->
                        <div class="mb-3 text-end">
                            <button class="btn btn-success" onclick="location.href = '{{Route('admin.categories.addCategory')}}'">
                                <i class="bi bi-plus-circle"></i> Add Category
                            </button>
                        </div>

                        <!-- Table with stripped rows -->
                        <div class="table">
                            <table class="table table-bordered">
                                <thead class="table-dark">
                                    <tr>
                                        <th>#</th>
                                        <th>Category Name</th>
                                        <th>Category Description</th>
                                        <th>Category Picture</th>
                                        <th>Actions</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <!-- Static Rows -->
                                    <tr>
                                        <td>1</td>
                                        <td>Electronics</td>
                                        <td>Devices, gadgets, and accessories</td>
                                        <td>
                                            <img src="/images/electronics.jpg" alt="Electronics" class="img-fluid" style="width: 80px; height: auto;">
                                        </td>
                                        <td>
                                            <button class="btn btn-primary btn-sm">Edit</button>
                                            <button class="btn btn-danger btn-sm">Delete</button>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td>2</td>
                                        <td>Furniture</td>
                                        <td>Chairs, tables, and sofas</td>
                                        <td>
                                            <img src="/images/furniture.jpg" alt="Furniture" class="img-fluid" style="width: 80px; height: auto;">
                                        </td>
                                        <td>
                                            <button class="btn btn-primary btn-sm">Edit</button>
                                            <button class="btn btn-danger btn-sm">Delete</button>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td>3</td>
                                        <td>Books</td>
                                        <td>Educational and fictional books</td>
                                        <td>
                                            <img src="/images/books.jpg" alt="Books" class="img-fluid" style="width: 80px; height: auto;">
                                        </td>
                                        <td>
                                            <button class="btn btn-primary btn-sm">Edit</button>
                                            <button class="btn btn-danger btn-sm">Delete</button>
                                        </td>
                                    </tr>
                                    <!-- Add more rows if needed -->
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
  