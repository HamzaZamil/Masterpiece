@extends('admin.source.template')

@section('content')

<main id="main" class="main">

    <div class="pagetitle">
        <h1>Order Details</h1>
        <nav>
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="/">Home</a></li>
                <li class="breadcrumb-item"><a href="{{ route('admin.orders.index') }}">Orders</a></li>
                <li class="breadcrumb-item active">Order Details</li>
            </ol>
        </nav>
    </div><!-- End Page Title -->

    <section class="section">
        <div class="row">
            <div class="col-lg-12">

                <div class="card">
                    <div class="card-body">
                        <h5 class="card-title">Order Details Table</h5>

                        <!-- Table with striped rows -->
                        <div class="table-responsive">
                            <table class="table table-bordered table-striped">
                                <thead class="table-dark">
                                    <tr>
                                        <th>Order ID</th>
                                        <th>User Name</th>
                                        <th>Item Name</th>
                                        <th>Quantity</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($order->orderItems as $orderItem)
                                    <tr>
                                        <td>{{ $order->id }}</td>
                                        <td>{{ $orderItem->user->name }}</td>
                                        <td>{{ $orderItem->item->item_name }}</td>
                                        <td>{{ $orderItem->quantity }}</td>
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
