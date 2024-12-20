@extends('admin.source.template')

@section('content')

<main id="main" class="main">

  <div class="d-flex justify-content-center"> <!-- Center the table -->
    <div class="table-responsive" style="max-width: 90%;"> <!-- Responsive table within a max width -->
      <table class="table table-bordered text-center"> <!-- Center text inside table cells -->
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
                <td><img src="{{ $pet['pet_image'] }}" alt="Pet Image" style="width: 50px; height: 50px;"></td>
                <td>{{ $pet['pet_medical_history'] }}</td>
            </tr>
            @endforeach
        </tbody>
      </table>
    </div>
  </div>

</main>

@endsection
