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
                        
                        <!-- Table with stripped rows -->
                        <div class="container mt-5">
                            <h2 class="mb-4">Categories Table</h2>
                            <div class="container mt-5">
                                <h2>Edit Category</h2>
                                <form action="{{route('admin.categories.storeCategory')}}" method="POST">
                                    @csrf
                                    <input type="hidden" name="id" value="">
                                    <div class="mb-3">
                                        <label for="categoryName" class="form-label">Category Name</label>
                                        <input type="text" class="form-control" id="categoryName" name="category_name" value="" required>
                                    </div>
                                    <div class="mb-3">
                                        <label for="categoryDescription" class="form-label">Category Description</label>
                                        <textarea class="form-control" id="categoryDescription" name="category_description" rows="3" required></textarea>
                                    </div>
                                    <div class="mb-3">
                                        <label for="categoryPicture" class="form-label">Category Picture</label>
                                        <input type="file" class="form-control" id="categoryPicture" name="category_picture" accept="image/*">
                                    </div>
                                    <button type="submit" class="btn btn-primary">Save Changes</button>
                                    <a href="/categories_table" class="btn btn-secondary">Cancel</a>
                                </form>
                            </div>
                        </div>

                    </div>
                </div>

            </div>
        </div>
    </section>

</main><!-- End #main -->

@endsection
