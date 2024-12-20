@extends('admin.source.template')

@section('content')

<main id="main" class="main">

  <div class="d-flex justify-content-center"> <!-- Center the table -->
    <div class="table-responsive" style="max-width: 90%;"> <!-- Responsive table within a max width -->
      <table class="table table-bordered text-center"> <!-- Center text inside table cells -->
        <thead class="table-dark">
            <tr>
                <th scope="col">#</th>
                <th scope="col">User Name</th>
                <th scope="col">Item Name</th>
                <th scope="col">Quantity</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($orderItems as $orderItem)
            <tr>
                <td>{{ $orderItem->id }}</td>
                <td>{{ $orderItem->user->name }}</td> <!-- Displaying user name -->
                <td>{{ $orderItem->item->item_name }}</td> <!-- Displaying item name -->
                <td>{{ $orderItem->quantity }}</td> <!-- Displaying quantity -->
            </tr>
            @endforeach
        </tbody>
      </table>
    </div>
  </div>

</main>

@endsection