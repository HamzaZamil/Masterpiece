@extends('admin.source.template')

@section('content')

<main id="main" class="main">

    <div class="pagetitle">
        <h1>Categories</h1>
        <nav>
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="/">Home</a></li>
                <li class="breadcrumb-item active">Categories Table</li>
            </ol>
        </nav>
    </div><!-- End Page Title -->

    <section class="section">
        <div class="row">
            <div class="col-lg-12">

                <div class="card">
                    <div class="card-body">
                        <h5 class="card-title">Categories Table</h5>

                        <!-- Add Category Button -->
                        <div class="mb-3 text-end">
                            <button class="btn btn-success" onclick="location.href = '{{Route('admin.categories.addCategory')}}'">
                                <i class="bi bi-plus-circle"></i> Add Category
                            </button>
                        </div>

                        <!-- Responsive and Searchable Table -->
                        <div class="table-responsive">
                            <table class="table table-bordered" id="categoriesTable">
                                <thead class="table-dark">
                                    <tr>
                                        <th>Category Name</th>
                                        <th>Category Description</th>
                                        <th>Category Picture</th>
                                        <th>Actions</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach($categories as $category)
                                    <tr>    
                                        <td>{{$category['category_name']}}</td>
                                        <td>{{$category['category_description']}}</td>
                                        <td>
                                            <img src="{{asset('storage/categories/'. $category['category_picture'])}}" alt="" width="100px" height="100px">
                                        </td>
                                        <td class="d-flex justify-content-center align-items-center" style="height: 100%; text-align: center;">
                                            <a href="{{ route('admin.categories.editCategory', $category['category_id']) }}" class="btn btn-warning"><i class="bi bi-pencil-square"></i></a>
                                            <form action="{{ route('admin.categories.deleteCategory', $category['category_id']) }}" method="POST" class="ms-2">
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

<!-- SweetAlert for Error Messages -->
@if(session('error'))
<script>
    Swal.fire({
        icon: 'error',
        title: 'Oops...',
        text: '{{ session("error") }}'
    });
</script>
@endif

<script>
    $(document).ready(function() {
        // Initialize DataTable with pagination and search enabled
        $('#categoriesTable').DataTable({
            paging: true,
            searching: true,
            responsive: true,
            order: [[0, 'asc']], // Default order by the first column (Category Name)
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
        if (confirm('Are you sure you want to delete this category?')) {
            button.closest('form').submit();
        }
    }
</script>

@endsection
