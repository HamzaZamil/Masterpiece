@extends('admin.source.template')

@section('content')

<main id="main" class="main">

  <div class="table">
    <table class="table table-bordered">
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
            <!-- Add more user rows as needed -->
        </tbody>
    </table>
</div>

</main>
@endsection
