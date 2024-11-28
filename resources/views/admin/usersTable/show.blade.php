@extends('admin.source.template')

@section('content')

<main id="main" class="main">

  <div class="table">
    <table class="table table-bordered">
        <thead class="table-dark">
            <tr>
                <th>First Name</th>
                <th>Last Name</th>
                <th>Email</th>
                <th>Phone</th>
                <th>Gender</th>
                <th>Address</th>
                <th>Role</th>
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
