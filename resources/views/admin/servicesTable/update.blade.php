@extends('admin.source.template')

@section('content')

<main id="main" class="main">

    <div class="pagetitle">
        <h1>Edit Service</h1>
        <nav>
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="/">Home</a></li>
                <li class="breadcrumb-item"><a href="{{ route('admin.services.index') }}">Services Table</a></li>
                <li class="breadcrumb-item active">Edit Service</li>
            </ol>
        </nav>
    </div><!-- End Page Title -->

    <section class="section">
        <div class="row">
            <div class="col-lg-8">

                <div class="card">
                    <div class="card-body">
                        <h5 class="card-title">Edit Service</h5>

                        <!-- Service Edit Form -->
                        <form action="{{ route('admin.services.updateService', $service['id']) }}" method="POST" enctype="multipart/form-data">
                            @csrf
                            @method('PATCH')

                            <div class="mb-3">
                                <label for="service_name" class="form-label">Service Name</label>
                                <input type="text" class="form-control" id="service_name" name="service_name" value="{{ $service['service_name'] }}" required>
                            </div>

                            <div class="mb-3">
                                <label for="service_description" class="form-label">Service Description</label>
                                <textarea class="form-control" id="service_description" name="service_description" rows="4" required>{{ $service['service_description'] }}</textarea>
                            </div>

                            <div class="mb-3">
                                <label for="service_price" class="form-label">Service Price</label>
                                <input type="number" class="form-control" id="service_price" name="service_price" value="{{ $service['service_price'] }}" step="0.01" required>
                            </div>

                            <div class="mb-3">
                                <label for="service_duration" class="form-label">Service Duration (in minutes)</label>
                                <input type="number" class="form-control" id="service_duration" name="service_duration" value="{{ $service['service_duration'] }}" step="1" min="1" required>
                            </div>

                            

                            <div class="text-end">
                                <button type="submit" class="btn btn-primary">Save Changes</button>
                                <a href="{{ route('admin.services.index') }}" class="btn btn-secondary">Cancel</a>
                            </div>
                        </form>

                    </div>
                </div>

            </div>
        </div>
    </section>

</main><!-- End #main -->

@endsection
