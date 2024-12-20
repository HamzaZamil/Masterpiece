@extends('admin.source.template')

@section('content')

<main id="main" class="main">

    <div class="pagetitle">
        <h1>Orders</h1>
        <nav>
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="/">Home</a></li>
                <li class="breadcrumb-item active">Orders Table</li>
            </ol>
        </nav>
    </div><!-- End Page Title -->

    <section class="section">
        <div class="row">
            <div class="col-lg-12">

                <div class="card">
                    <div class="card-body">
                        <h5 class="card-title">Orders Table</h5>

                        <!-- Add Order Button -->
                        <div class="mb-3 text-end">
                            <button class="btn btn-success" onclick="location.href = '{{route('admin.orders.addOrder')}}'">
                                <i class="bi bi-plus-circle"></i> Add Order
                            </button>
                        </div>

                        <!-- Table with stripped rows -->
                        <div class="table-responsive">
                            <h2 class="mb-4">Orders Table</h2>
                            <table class="table table-bordered">
                                <thead class="table-dark">
                                    <tr>
                                        <th>#</th>
                                        <th>User Name</th>
                                        <th>Order Total</th>
                                        <th>Order Address</th>
                                        <th>Order Status</th>
                                        <th>Actions</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($orders as $order)
                                    <tr>
                                        <td>{{ $order->id }}</td>
                                        <td>{{ $order->user->name }}</td> <!-- Assuming 'name' is the user name field -->
                                        <td>{{ $order->order_total }}</td>
                                        <td>{{ $order->order_address }}</td>
                                        <td>{{ $order->order_status }}</td>
                                        <td class="d-flex">
                                            <a href="{{ route('admin.orders.showOrder', $order->id) }}" class="btn btn-info"><i class="bi bi-eye"></i></a>
                                            <a href="{{ route('admin.orders.editOrder', $order->id) }}" class="btn btn-warning"><i class="bi bi-pencil-square"></i></a>
                                            <form action="{{ route('admin.orders.deleteOrder', $order->id) }}" method="POST">
                                                @csrf
                                                @method('DELETE')
                                                <button type="submit" class="btn btn-danger"><i class="bi bi-trash3-fill"></i></button>
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
