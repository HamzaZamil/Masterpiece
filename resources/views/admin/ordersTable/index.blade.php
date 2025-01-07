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
                        {{-- <div class="mb-3 text-end">
                            <button class="btn btn-success" onclick="location.href = '{{route('admin.orders.addOrder')}}'">
                                <i class="bi bi-plus-circle"></i> Add Order
                            </button>
                        </div> --}}

                        <!-- Table with striped rows -->
                        <div class="table-responsive">
                            <table class="table table-bordered table-striped" id="ordersTable">
                                <thead class="table-dark">
                                    <tr>
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
                                        <td>{{ $order->user ? $order->user->name : 'No User' }}</td>
                                        <td>JD{{ number_format($order->order_total, 2) }}</td>
                                        <td>{{ $order->order_address }}</td>
                                        <td>
                                            <form action="{{ route('admin.orders.updateOrder', $order->id) }}" method="POST" id="statusForm{{ $order->id }}">
                                                @csrf
                                                @method('PATCH')
                                                <select class="form-select" name="order_status" onchange="document.getElementById('statusForm{{ $order->id }}').submit();">
                                                    <option value="pending" {{ $order->order_status == 'pending' ? 'selected' : '' }}>Pending</option>
                                                    <option value="accepted" {{ $order->order_status == 'accepted' ? 'selected' : '' }}>Accepted</option>
                                                    <option value="in_progress" {{ $order->order_status == 'in_progress' ? 'selected' : '' }}>In Progress</option>
                                                    <option value="done" {{ $order->order_status == 'done' ? 'selected' : '' }}>Done</option>
                                                </select>
                                            </form>
                                        </td>
                                        <td class="d-flex">
                                            <a href="{{ route('admin.orders.showOrder', $order->id) }}" class="btn btn-info me-2"><i class="bi bi-eye"></i></a>
                                            <form action="{{ route('admin.orders.deleteOrder', $order->id) }}" method="POST">
                                                @csrf
                                                @method('DELETE')
                                                <button type="button" class="btn btn-danger" onclick="confirmDelete(this)"><i class="bi bi-trash3-fill"></i></button>
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

<!-- Add DataTables dependencies -->
<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
<script src="https://cdn.datatables.net/1.13.5/js/jquery.dataTables.min.js"></script>
<script src="https://cdn.datatables.net/1.13.5/js/dataTables.bootstrap5.min.js"></script>
<link rel="stylesheet" href="https://cdn.datatables.net/1.13.5/css/dataTables.bootstrap5.min.css" />

<script>
    $(document).ready(function() {
        $('#ordersTable').DataTable({
            paging: true,
            searching: true,
            responsive: true,
            order: [[0, 'asc']], // Default order by the first column (ID)
            language: {
                search: "Search:",
                lengthMenu: "Show _MENU_ entries",
                info: "Showing _START_ to _END_ of _TOTAL_ entries",
                paginate: {
                    first: "First",
                    last: "Last",
                    next: "Next",
                    previous: "Previous"
                }
            }
        });
    });

    function confirmDelete(button) {
        if (confirm('Are you sure you want to delete this order?')) {
            button.closest('form').submit();
        }
    }
</script>

@if (session('success'))
<div class="alert alert-success">
    {{ session('success') }}
</div>
@endif

@endsection
