@extends('admin.source.template')

@section('content')

<main id="main" class="main">

    <div class="pagetitle">
        <h1>Item Details</h1>
        <nav>
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="/">Home</a></li>
                <li class="breadcrumb-item"><a href="{{ route('admin.items.index') }}">Items</a></li>
                <li class="breadcrumb-item active">Item Details</li>
            </ol>
        </nav>
    </div><!-- End Page Title -->

    <section class="section">
        <div class="row">
            <div class="col-lg-12">

                <div class="card">
                    <div class="card-body">
                        <h2 class="text-center mb-4">Item Details</h2>

                        <div class="table-responsive">
                            <table class="table table-bordered">
                                <thead class="table-dark">
                                    <tr>
                                        <th scope="col">Item Type</th>
                                        <th scope="col">Item Name</th>
                                        <th scope="col">Description</th>
                                        <th scope="col">Price</th>
                                        <th scope="col">Stock</th>
                                        <th scope="col">Picture</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <tr>
                                        <td>{{ ucfirst($item->item_type) }}</td>
                                        <td>{{ $item->item_name }}</td>
                                        <td>{{ $item->item_description }}</td>
                                        <td>${{ number_format($item->item_price, 2) }}</td>
                                        <td>{{ $item->item_stock }}</td>
                                        <td>
                                            @if($item->item_picture)
                                                <img src="{{ asset('storage/items/' . $item->item_picture) }}" alt="Item Picture" class="img-thumbnail" style="width: 150px; height: 150px;">
                                            @else
                                                <span>No Image</span>
                                            @endif
                                        </td>
                                    </tr>
                                </tbody>
                            </table>
                        </div>

                        <div class="text-end mt-4">
                            <a href="{{ route('admin.items.index') }}" class="btn btn-secondary">Back to Items</a>
                        </div>
                    </div>
                </div>

            </div>
        </div>
    </section>

</main><!-- End #main -->

@endsection
