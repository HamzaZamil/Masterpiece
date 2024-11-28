@extends('admin.source.template')

@section('content')

<main id="main" class="main">

    <div class="pagetitle">
        <h1>Add New Service</h1>
        <nav>
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="/">Home</a></li>
                <li class="breadcrumb-item"><a href="{{ route('admin.services.addService') }}">Services Table</a></li>
                <li class="breadcrumb-item active">Add Service</li>
            </ol>
        </nav>
    </div><!-- End Page Title -->

    <section class="section">
        <div class="row">
            <div class="col-lg-12">

                <div class="card">
                    <div class="card-body">

                        <h2 class="text-center mb-4">Add New Service</h2>

                        <form action="{{ route('admin.services.storeService') }}" method="POST" enctype="multipart/form-data" class="p-4">
                            @csrf

                            <div class="row mb-3">
                                <div class="col-md-6">
                                    <label for="service_name" class="form-label">Service Name</label>
                                    <input type="text" class="form-control" id="service_name" name="service_name" value="{{ old('service_name') }}" required>
                                </div>
                                <div class="col-md-6">
                                    <label for="category" class="form-label">Category</label>
                                    <select class="form-select" id="category" name="category" required>
                                        <option value="">Select Category</option>
                                        <option value="Pets">Pets</option>
                                        <option value="Cleaning">Cleaning</option>
                                        <option value="Gardening">Gardening</option>
                                    </select>
                                </div>
                            </div>

                            <div class="row mb-3">
                                <div class="col-md-6">
                                    <label for="price" class="form-label">Price ($)</label>
                                    <input type="number" class="form-control" id="price" name="price" value="{{ old('price') }}" step="0.01" required>
                                </div>
                                <div class="col-md-6">
                                    <label for="image" class="form-label">Service Image</label>
                                    <input type="file" class="form-control" id="image" name="image" accept="image/*">
                                </div>
                            </div>

                            <div class="row mb-3">
                                <div class="col-md-12">
                                    <label for="description" class="form-label">Description</label>
                                    <textarea class="form-control" id="description" name="description" rows="4" required>{{ old('description') }}</textarea>
                                </div>
                            </div>

                            <div class="text-center">
                                <button type="submit" class="btn btn-primary px-5">Save Service</button>
                                <a href="{{ route('admin.services.index') }}" class="btn btn-secondary px-5">Cancel</a>
                            </div>
                        </form>

                    </div>
                </div>

            </div>
        </div>
    </section>

</main><!-- End #main -->

@endsection
