@extends('admin.source.template')

@section('content')

<main id="main" class="main">

    <div class="pagetitle">
        <h1>Users</h1>
        <nav>
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="/">Home</a></li>
                <li class="breadcrumb-item active">Users Table</li>
            </ol>
        </nav>
    </div><!-- End Page Title -->

    <section class="section">
        <div class="row">
            <div class="col-lg-12">

                <div class="card">
                    <div class="card-body">
                        <h5 class="card-title">Users Table</h5>

                        <!-- Add User Button -->
                        <div class="mb-3 text-end">
                            <button class="btn btn-success" onclick="location.href = '{{Route('admin.users.addUser')}}'">
                                <i class="bi bi-person-plus"></i> Add User
                            </button>
                        </div>

                        <!-- Table with stripped rows -->
                        <div class="table">
                            <table class="table table-bordered">
                                <thead class="table-dark">
                                    <tr>
                                        <th>First Name</th>
                                        <th>Last Name</th>
                                        <th>Email</th>
                                        <th>Role</th>
                                        <th>Actions</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($data as $user)
                                    <tr>
                                        <td>{{ $user['name'] }}</td>
                                        <td>{{ $user['last_name'] }}</td>
                                        <td>{{ $user['email'] }}</td>
                                        <td>{{ $user['role'] }}</td>

                                        <td class="d-flex"> 
                                            <a href="{{ route('admin.users.editUser', $user['id']) }}" class="btn btn-warning"><i class="bi bi-pencil-square "></i></a>
                                            <a href="{{ route('admin.users.showUser', $user['id']) }}" class="btn btn-info"><i class="bi bi-eye"></i></a>
                                            <form action="{{ route('admin.users.deleteUser', $user['id']) }}" method="POST">
                                                @csrf
                                                @method('DELETE')
                                                <button type="button" class="btn btn-danger" onclick="confirmDelete(this)"><i class="bi bi-trash3-fill"></i></button>
                                            </form>
                                        </td>
                                    </tr>
                                @endforeach
                                    <!-- Add more user rows as needed -->
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
