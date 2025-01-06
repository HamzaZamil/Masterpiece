@extends('admin.source.template')

@section('content')
<main id="main" class="main">
    <div class="pagetitle">
        <h1>Users</h1>
    </div>

    <section class="section">
        <div class="row">
            <div class="col-lg-12">
                <div class="card">
                    <div class="card-body">
                        <h5 class="card-title">Users Table</h5>

                        <!-- Go Back Button -->
                        <div class="mb-3">
                            <button class="btn btn-secondary" onclick="history.back()">
                                <i class="bi bi-arrow-left"></i> Back To Users Page
                            </button>
                        </div>

                        <!-- Table -->
                        <div class="table-responsive">
                            <table class="table table-bordered" id="usersTable">
                                <thead class="table-dark">
                                    <tr>
                                        <th scope="col">First Name</th>
                                        <th scope="col">Last Name</th>
                                        <th scope="col">Email</th>
                                        <th scope="col">Phone</th>
                                        <th scope="col">Gender</th>
                                        <th scope="col">Address</th>
                                        <th scope="col">Role</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($data as $user)
                                    <tr>
                                        <td>{{ $user['name'] }}</td>
                                        <td>{{ $user['last_name'] }}</td>
                                        <td>{{ $user['email'] }}</td>
                                        <td>{{ $user['phone_number'] }}</td>
                                        <td>{{ $user['gender'] }}</td>
                                        <td>{{ $user['address'] }}</td>
                                        <td>{{ $user['role'] }}</td>
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
</main>

<!-- Add DataTables dependencies -->
<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
<script src="https://cdn.datatables.net/1.13.5/js/jquery.dataTables.min.js"></script>
<script src="https://cdn.datatables.net/1.13.5/js/dataTables.bootstrap5.min.js"></script>
<link rel="stylesheet" href="https://cdn.datatables.net/1.13.5/css/dataTables.bootstrap5.min.css" />

<script>
    $(document).ready(function() {
        // Initialize DataTable with pagination and search enabled
        $('#usersTable').DataTable({
            paging: true,
            searching: true,
            responsive: true,
            order: [[0, 'asc']], // Default order by the first column (First Name)
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
</script>
@endsection
