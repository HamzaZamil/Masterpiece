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

                        <h2 class="text-center mb-4">Add Category</h2>

                        <form action="{{ route('admin.categories.storeCategory') }}" method="POST" enctype="multipart/form-data" class="p-4">
                            @csrf
                            <input type="hidden" name="id" value="">

                            <div class="row mb-3">
                                <div class="col-md-12">
                                    <label for="category_name" class="form-label">Category Name</label>
                                    <input type="text" class="form-control" id="category_name" name="category_name" value="" required>
                                </div>
                            </div>

                            <div class="row mb-3">
                                <div class="col-md-12">
                                    <label for="category_description" class="form-label">Category Description</label>
                                    <textarea class="form-control" id="category_description" name="category_description" rows="4" required></textarea>
                                </div>
                            </div>

                            <div class="row mb-3">
                                <div class="col-md-12">
                                    <label for="category_picture" class="form-label">Category Picture</label>
                                    <input type="file" class="form-control" id="category_picture" name="category_picture" accept="image/*">
                                </div>
                            </div>

                            <div class="text-center">
                                <button type="submit" class="btn btn-primary px-5">Save Changes</button>
                                <a href="{{ route('admin.categories.index') }}" class="btn btn-secondary px-5">Cancel</a>
                            </div>
                        </form>

                    </div>
                </div>

            </div>
        </div>
    </section>

</main><!-- End #main -->

@endsection
