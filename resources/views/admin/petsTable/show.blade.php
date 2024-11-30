@extends('admin.source.template')

@section('content')

<main id="main" class="main">

  <div class="table">
    <table class="table table-bordered">
        <thead class="table-dark">
            <tr>
                <th scope="col">Pet Name</th>
                <th scope="col">Pet Type</th>
                <th scope="col">Pet Breed</th>
                <th scope="col">Pet Age</th>
                <th scope="col">Pet Weight</th>
                <th scope="col">Pet Gender</th>
                <th scope="col">Pet Image</th>
                <th scope="col">Pet Medical History</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($data as $pet)
            <tr>
                <td>{{ $pet['pet_name'] }}</td>
                <td>{{ $pet['pet_type'] }}</td>
                <td>{{ $pet['pet_breed'] }}</td>
                <td>{{ $pet['pet_age'] }}</td>
                <td>{{ $pet['pet_weight'] }}</td>
                <td>{{ $pet['pet_gender'] }}</td>
                <td>{{ $pet['pet_image'] }}</td>
                <td>{{ $pet['pet_medical_history'] }}</td>

             
            </tr>
        @endforeach
            <!-- Add more user rows as needed -->
        </tbody>
    </table>
</div>


</main><!-- End #main -->

@endsection
