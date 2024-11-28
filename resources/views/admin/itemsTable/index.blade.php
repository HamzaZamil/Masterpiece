@extends('admin.source.template')

@section('content')

<main id="main" class="main">

    <div class="pagetitle">
        <h1>Items</h1>
        <nav>
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="/">Home</a></li>
                <li class="breadcrumb-item active">Items Table</li>
            </ol>
        </nav>
    </div><!-- End Page Title -->

    <section class="section">
        <div class="row">
            <div class="col-lg-12">

                <div class="card">
                    <div class="card-body">
                        <h2 class="text-center mb-4">Items Table</h2>
                        
                        <!-- Add Item Button -->
                        <div class="text-end mb-3">
                            <button class="btn btn-success"><i class="bi bi-plus-circle"></i> Add Item</button>
                        </div>

                        <!-- Items Table -->
                        <div class="table-responsive">
                            <table class="table table-striped table-hover">
                                <thead class="table-dark">
                                    <tr>
                                        <th>#</th>
                                        <th>Item Type</th>
                                        <th>Item Name</th>
                                        <th>Description</th>
                                        <th>Price</th>
                                        <th>Stock</th>
                                        {{-- <th>Image</th> --}}
                                        <th>Actions</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <tr>
                                        <td>1</td>
                                        <td>Cat</td>
                                        <td>Litterbox</td>
                                        <td>High-quality litterbox for cats.</td>
                                        <td>$25.99</td>
                                        <td>20</td>
                                        {{-- <td>
                                            <img src="https://via.placeholder.com/640x480.png/00cc11?text=categories+Category+Image+sint" alt="Item Image" class="img-thumbnail" style="width: 50px;">
                                        </td> --}}
                                        <td>
                                            <button class="btn btn-primary btn-sm"><i class="bi bi-pencil-square"></i> Edit</button>
                                            <button class="btn btn-danger btn-sm"><i class="bi bi-trash"></i> Delete</button>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td>2</td>
                                        <td>Dog</td>
                                        <td>Chew Toy</td>
                                        <td>Durable chew toy for dogs.</td>
                                        <td>$15.50</td>
                                        <td>50</td>
                                        {{-- <td>
                                            <img src="https://via.placeholder.com/640x480.png/00cc11?text=categories+Category+Image+sint" alt="Item Image" class="img-thumbnail" style="width: 50px;">
                                        </td> --}}
                                        <td>
                                            <button class="btn btn-primary btn-sm"><i class="bi bi-pencil-square"></i> Edit</button>
                                            <button class="btn btn-danger btn-sm"><i class="bi bi-trash"></i> Delete</button>
                                        </td>
                                    </tr>
                                    <!-- Add more rows dynamically if needed -->
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
