@extends('admin.source.template')

@section('content')

<div class="container mt-5">
  <h2>Edit User</h2>
  <form action="update_user.php" method="POST">
    <input type="hidden" name="id" value="<?php echo $id; ?>">
    <div class="mb-3">
      <label for="firstName" class="form-label">First Name</label>
      <input type="text" class="form-control" id="firstName" name="firstName" value="<?php echo $firstName; ?>" required>
    </div>
    <div class="mb-3">
      <label for="lastName" class="form-label">Last Name</label>
      <input type="text" class="form-control" id="lastName" name="lastName" value="<?php echo $lastName; ?>" required>
    </div>
    <div class="mb-3">
      <label for="email" class="form-label">Email</label>
      <input type="email" class="form-control" id="email" name="email" value="<?php echo $email; ?>" required>
    </div>
    <div class="mb-3">
      <label for="phone" class="form-label">Phone</label>
      <input type="text" class="form-control" id="phone" name="phone" value="<?php echo $phone; ?>" required>
    </div>
    <button type="submit" class="btn btn-primary">Save Changes</button>
    <a href="users_table.php" class="btn btn-secondary">Cancel</a>
  </form>
</div>

@endsection