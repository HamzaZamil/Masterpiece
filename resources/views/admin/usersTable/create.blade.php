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
              
              
              <!-- Table with stripped rows -->
              <div class="container mt-5">
                 <h2 class="mb-4">Users Table</h2>
                     <div class="container mt-5">
                         <h2>Add User</h2>
                             <form action="{{route('admin.users.storeUser')}}" method="POST">
                                @csrf
                                 <input type="hidden" name="id" value="">
                                    <div class="mb-3">
                                          <label for="firstName" class="form-label">First Name</label>
                                             <input type="text" class="form-control" id="firstName" name="first_Name" value="{{old(first_Name)}}" required>
                                    </div>
                                         <div class="mb-3">
                                             <label for="lastName" class="form-label">Last Name</label>
                                            <input type="text" class="form-control" id="lastName" name="last_Name" value="" required>
                                         </div>
                                     <div class="mb-3">
                                        <label for="gender" class="form-label">Gender</label>   
                                            <select class="form-control" id="gender" name="gender" required>
                                              <option value="" disabled selected>Select Gender</option>
                                              <option value="male">Male</option>
                                               <option value="female">Female</option>
                                             </select>
                                     </div>
                                     <div class="mb-3">
                                        <label for="email" class="form-label">Email</label>
                                        <input type="email" class="form-control" id="email" name="email" value="" required>
                                     </div>
                                     <div class="mb-3">
                                        <label for="password" class="form-label">Password</label>
                                        <input type="password" class="form-control" id="password" name="password" value="" required>
                                     </div>
                                     <div class="mb-3">
                                        <label for="phone" class="form-label">Phone</label>
                                        <input type="text" class="form-control" id="phone" name="phone" value="" required>
                                     </div>
                                     <div class="mb-3">
                                        <label for="address" class="form-label">Address</label>
                                        <input type="text" class="form-control" id="address" name="address" value="" required>
                                     </div>
                                     <div class="mb-3">
                                    <label for="role" class="form-label">Role</label>
                                          <select class="form-control" id="role" name="role" required>
                                             <option value="" disabled selected>Select Role</option>
                                             <option value="vet">Vet</option>
                                            <option value="user">User</option>
                                          </select>
                                     </div>
                                                 <button type="submit" class="btn btn-primary">Add User</button>
                                                  <a href="users_table.php" class="btn btn-secondary">Cancel</a>
                                 </form>
                            </div>
                </div>

            </div>
          </div>

        </div>
      </div>
    </section>

  </main><!-- End #main -->



@endsection