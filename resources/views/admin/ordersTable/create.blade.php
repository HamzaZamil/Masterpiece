@extends('admin.source.template')

@section('content')

<main id="main" class="main">

    <div class="pagetitle">
        <h1>Add New Order</h1>
        <nav>
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="/">Home</a></li>
                <li class="breadcrumb-item"><a href="{{ route('admin.orders.index') }}">Orders</a></li>
                <li class="breadcrumb-item active">Add Order</li>
            </ol>
        </nav>
    </div><!-- End Page Title -->

    <section class="section">
        <div class="row">
            <div class="col-lg-12">

                <div class="card">
                    <div class="card-body">
                        <h2 class="text-center mb-4">Add New Order</h2>
                        @if ($errors->any())
                        <div class="alert alert-danger">
                            <ul>
                                @foreach ($errors->all() as $error)
                                    <li>{{ $error }}</li>
                                @endforeach
                            </ul>
                        </div>
                        @endif

                        <!-- Form for adding new order -->
                        <form action="{{ route('admin.orders.storeOrder') }}" method="POST">
                            @csrf

                            <!-- User Selection -->
                            <div class="mb-3">
                                <label for="user_id" class="form-label">Customer</label>
                                <select name="user_id" id="user_id" class="form-control @error('user_id') is-invalid @enderror" required>
                                    <option value="">Select a Customer</option>
                                    @foreach ($users as $user)
                                        <option value="{{ $user->id }}" {{ old('user_id') == $user->id ? 'selected' : '' }}>{{ $user->name }}</option>
                                    @endforeach
                                </select>
                                @error('user_id')
                                    <div class="invalid-feedback">{{ $message }}</div>
                                @enderror
                            </div>

                            <div class="mb-3">
                                <label for="order_total" class="form-label">Order Total</label>
                                <input type="number" name="order_total" id="order_total" class="form-control @error('order_total') is-invalid @enderror" value="{{ old('order_total') }}" step="0.01" required>
                                @error('order_total')
                                    <div class="invalid-feedback">{{ $message }}</div>
                                @enderror
                            </div>

                            <div class="mb-3">
                                <label for="order_address" class="form-label">Order Address</label>
                                <input type="text" name="order_address" id="order_address" class="form-control @error('order_address') is-invalid @enderror" value="{{ old('order_address') }}" required>
                                @error('order_address')
                                    <div class="invalid-feedback">{{ $message }}</div>
                                @enderror
                            </div>

                            <div class="mb-3">
                                <label for="order_status" class="form-label">Order Status</label>
                                <select name="order_status" id="order_status" class="form-control @error('order_status') is-invalid @enderror">
                                    <option value="pending" {{ old('order_status') == 'pending' ? 'selected' : '' }}>Pending</option>
                                    <option value="accepted" {{ old('order_status') == 'accepted' ? 'selected' : '' }}>Accepted</option>
                                    <option value="declined" {{ old('order_status') == 'declined' ? 'selected' : '' }}>Declined</option>
                                    <option value="done" {{ old('order_status') == 'done' ? 'selected' : '' }}>Done</option>
                                    <option value="in_progress" {{ old('order_status') == 'in_progress' ? 'selected' : '' }}>In Progress</option>
                                </select>
                                @error('order_status')
                                    <div class="invalid-feedback">{{ $message }}</div>
                                @enderror
                            </div>

                            <div class="text-end">
                                <button type="submit" class="btn btn-success">Save Order</button>
                            </div>
                        </form>

                    </div>
                </div>

            </div>
        </div>
    </section>

</main><!-- End #main -->

@endsection
