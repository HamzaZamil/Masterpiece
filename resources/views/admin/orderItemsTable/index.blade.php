@extends('admin.source.template')

@section('content')

<main id="main" class="main">

<div class="container">
    <h1>Order Items List</h1>


      <!-- Add Order Item Button -->
      <div class="mb-3 text-end">
        <button class="btn btn-success" onclick="location.href = '{{ route('admin.orderItems.addOrderItems') }}'">
            <i class="bi bi-plus-circle"></i> Add Order Item
        </button>
    </div>


    <table class="table table-bordered">
        <thead>
            <tr>
                <th>ID</th>
                <th>User</th>
                <th>Order ID</th>
                <th>Item</th>
                <th>Quantity</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($orderItems as $orderItem)
            <tr>
                <td>{{ $orderItem->id }}</td>
                <td>{{ $orderItem->user->name }}</td> <!-- Assuming user has a name attribute -->
                <td>{{ $orderItem->order_id }}</td>
                <td>{{ $orderItem->item->item_name }}</td> <!-- Assuming item has an item_name attribute -->
                <td>{{ $orderItem->quantity }}</td>
            </tr>
            @endforeach
        </tbody>
    </table>
</div>

</main>
@endsection
