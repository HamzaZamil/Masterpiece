@extends('admin.source.template')

@section('content')

<main id="main" class="main">

    <div class="pagetitle">
        <h1>Create Wishlist Item</h1>
        <nav>
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="/">Home</a></li>
                <li class="breadcrumb-item"><a href="{{ route('admin.wishList.index') }}">Wishlist</a></li>
                <li class="breadcrumb-item active">Create Wishlist Item</li>
            </ol>
        </nav>
    </div><!-- End Page Title -->

    <section class="section">
        <div class="row">
            <div class="col-lg-8 offset-lg-2">

                <div class="card">
                    <div class="card-body">
                        <h2 class="text-center mb-4">Create Wishlist Item</h2>

                        <form action="{{ route('admin.wishList.storeWishList') }}" method="POST">
                            @csrf

                            <!-- User Selection -->
                            <div class="mb-3">
                                <label for="user_id" class="form-label">User</label>
                                <select name="user_id" id="user_id" class="form-control" required>
                                    <option value="" disabled selected>Select a User</option>
                                    @foreach ($users as $user)
                                        <option value="{{ $user->id }}">{{ $user->name }}</option>
                                    @endforeach
                                </select>
                            </div>

                            <!-- Item Selection -->
                            <div class="mb-3">
                                <label for="item_id" class="form-label">Item</label>
                                <select name="item_id" id="item_id" class="form-control" required>
                                    <option value="" disabled selected>Select an Item</option>
                                    @foreach ($items as $item)
                                        <option value="{{ $item->id }}">{{ $item->item_name }}</option>
                                    @endforeach
                                </select>
                            </div>

                            <!-- State Selection -->
                            <div class="mb-3">
                                <label for="state" class="form-label">State</label>
                                <select name="state" id="state" class="form-control" required>
                                    <option value="1">In Wishlist</option>
                                    <option value="0">Not In Wishlist</option>
                                </select>
                            </div>

                            <!-- Submit Button -->
                            <div class="text-end">
                                <button type="submit" class="btn btn-success">
                                    <i class="bi bi-check-circle"></i> Create Wishlist Item
                                </button>
                            </div>
                        </form>

                    </div>
                </div>

            </div>
        </div>
    </section>

</main><!-- End #main -->

@endsection
