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
                        <h5 class="card-title">Items Table</h5>

                        <!-- Add Item Button -->
                        <div class="mb-3 text-end">
                            <button class="btn btn-success" onclick="location.href = '{{Route('admin.items.addItem')}}'">
                                <i class="bi bi-plus-circle"></i> Add Item
                            </button>
                        </div>

                        <!-- Table with striped rows -->
                        <div class="table-responsive">
                            <table class="table table-bordered table-striped" id="itemsTable">
                                <thead class="table-dark">
                                    <tr>
                                        <th>Item Type</th>
                                        <th>Item Name</th>
                                        <th>Picture</th>
                                        <th>Actions</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($items as $item)
                                    <tr>
                                        <td>{{ ucfirst($item->item_type) }}</td>
                                        <td>{{ $item->item_name }}</td>
                                        <td>
                                            @if($item->item_picture)
                                            <img src="{{ asset('storage/items/' . $item->item_picture) }}" alt="Item Picture" width="100px" height="100px">
                                            @else
                                                <span>No Image</span>
                                            @endif
                                        </td>
                                        <td class="d-flex">
                                            <!-- Edit Button -->
                                            <a href="{{ route('admin.items.editItem', $item->id) }}" class="btn btn-warning me-2"><i class="bi bi-pencil-square"></i></a>
                                            
                                            <!-- Show Button -->
                                            <a href="{{ route('admin.items.showItem', $item->id) }}" class="btn btn-info me-2"><i class="bi bi-eye"></i></a>

                                            <!-- Delete Button -->
                                            <form action="{{ route('admin.items.deleteItem', $item->id) }}" method="POST">
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
        $('#itemsTable').DataTable({
            paging: true,
            searching: true,
            responsive: true,
            order: [[0, 'asc']], // Default order by the first column (Item Type)
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
        if (confirm('Are you sure you want to delete this item?')) {
            button.closest('form').submit();
        }
    }
</script>

@endsection
