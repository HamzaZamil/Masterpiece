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
                        @if ($errors->all())
                    <div>
                        <ul>
                            @foreach ($errors->all() as $error)
                                <li class="text-danger">
                                    {{ $error }}
                                </li>
                            @endforeach
                        </ul>
                    </div>
                @endif

                        <form action="{{ route('admin.services.storeService') }}" method="POST" enctype="multipart/form-data" class="p-4">
                            @csrf

                            <div class="row mb-3">
                                <div class="col-md-6">
                                    <label for="service_name" class="form-label">Service Name</label>
                                    <input type="text" class="form-control" id="service_name" name="service_name" value="{{ old('service_name') }}" required>
                                </div>
                               
                            </div>

                            <div class="row mb-3">
                                <div class="col-md-6">
                                    <label for="service_price" class="form-label">Price ($)</label>
                                    <input type="number" class="form-control" id="service_price" name="service_price" value="{{ old('service_price') }}" step="0.01" required>
                                </div>
                               
                            </div>

                            <div class="row mb-3">
                                <div class="col-md-12">
                                    <label for="service_duration" class="form-label">Duration (in minutes)</label>
                                    <input type="number" class="form-control" id="service_duration" name="service_duration" value="{{ old('service_duration') }}" step="1" min="1" required>
                                </div>
                            </div>
                            

                            <div class="row mb-3">
                                <div class="col-md-12">
                                    <label for="service_description" class="form-label">Description</label>
                                    <textarea class="form-control" id="service_description" name="service_description" rows="4" required>{{ old('service_description') }}</textarea>
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
