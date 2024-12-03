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
                            <a href="{{ route('admin.items.addItem') }}" class="btn btn-success"><i class="bi bi-plus-circle"></i> Add Item</a>
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
                                        <th>Actions</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($items as $item)
                                        <tr>
                                            <td>{{ $loop->iteration }}</td>
                                            <td>{{ ucfirst($item->item_type) }}</td>
                                            <td>{{ $item->item_name }}</td>
                                            <td>{{ $item->item_description }}</td>
                                            <td>${{ number_format($item->item_price, 2) }}</td>
                                            <td>{{ $item->item_stock }}</td>
                                            <td>
                                                <!-- Edit Button -->
                                                <a href="{{ route('admin.items.editItem', $item->id) }}" class="btn btn-primary btn-sm"><i class="bi bi-pencil-square"></i> Edit</a>

                                                <!-- Delete Button -->
                                                <form action="{{ route('admin.items.deleteItem', $item->id) }}" method="POST" style="display:inline-block;" onsubmit="return confirm('Are you sure you want to delete this item?');">
                                                    @csrf
                                                    @method('DELETE')
                                                    <button type="submit" class="btn btn-danger btn-sm"><i class="bi bi-trash"></i> Delete</button>
                                                </form>
                                            </td>
                                        </tr>
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
