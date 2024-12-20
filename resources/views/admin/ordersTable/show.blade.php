@extends('admin.source.template')

@section('content')

<main id="main" class="main">

    <div class="container">
        <h1>Order Details (Order ID: {{ $order->id }})</h1>
        <div class="table-responsive">
            <table class="table table-bordered">
                <thead class="table-dark">
                    <tr>
                        <th>Order ID</th>
                        <th>User Name</th>
                        <th>Item ID</th>
                        <th>Quantity</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($order->orderItems as $orderItem)
                    <tr>
                        <td>{{ $order->id }}</td>
                        <td>{{ $orderItem->user->name }}</td>
                        <td>{{ $orderItem->item->id }}</td>
                        <td>{{ $orderItem->quantity }}</td>
                    </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>

</main>

@endsection
