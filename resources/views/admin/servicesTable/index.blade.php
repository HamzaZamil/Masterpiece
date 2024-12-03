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
                                        <th>Service Name</th>
                                        <th>Service Description</th>
                                        <th>Service Price</th>
                                        <th>Service Duration</th>
                                        <th>Actions</th>
                                    </tr>
                                </thead>
                                @foreach($services as $service)
                                <tbody>
                                    <!-- Static Rows -->
                                    <tr>    
                                        <td>{{$service['service_name']}}</td>
                                        <td>{{$service['service_description']}}</td>
                                        <td>{{$service['service_price']}}</td>
                                        <td>{{$service['service_duration']}}</td>
                                        
                                        <td class="d-flex">
                                            <a href="{{ route('admin.services.editService', $service['id']) }}" class="btn btn-warning"><i class="bi bi-pencil-square "></i></a>
                                            <form action="{{ route('admin.services.deleteService', $service['id']) }}" method="POST">
                                                @csrf
                                                @method('DELETE')
                                                <button type="button" class="btn btn-danger" onclick="confirmDelete(this)"><i class="bi bi-trash3-fill"></i></button>
                                            </form>
                                        </td>
                                    </tr>
                                    <!-- Add more rows if needed -->
                                    @endforeach
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
