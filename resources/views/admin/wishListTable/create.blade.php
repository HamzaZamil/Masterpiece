@extends('admin.source.template')

@section('content')

<main id="main" class="main">

    <div class="pagetitle">
        <h1>Add to Wishlist</h1>
        <nav>
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="{{ route('admin.wishList.index') }}">Home</a></li>
                <li class="breadcrumb-item active">Add to Wishlist</li>
            </ol>
        </nav>
    </div><!-- End Page Title -->

    <section class="section">
        <div class="row">
            <div class="col-lg-12">

                <div class="card">
                    <div class="card-body">

                        <h2 class="text-center mb-4">Add to Wishlist</h2>

                        <form action="{{ route('admin.wishList.storeWishList') }}" method="POST" class="p-4">
                            @csrf
                            <div class="row mb-3">
                                <div class="col-md-12">
                                    <label for="user_id" class="form-label">User</label>
                                    <select class="form-control" id="user_id" name="user_id" required>
                                        <option value="" disabled selected>Select User</option>
                                        @foreach($users as $user)
                                            <option value="{{ $user->id }}">{{ $user->name }} {{ $user->last_name }}</option>
                                        @endforeach
                                    </select>
                                    @error('user_id')
                                        <span style="color:red;">{{ $message }}</span>
                                    @enderror
                                </div>
                            </div>

                            <div class="row mb-3">
                                <div class="col-md-12">
                                    <label for="item_id" class="form-label">Item</label>
                                    <select class="form-control" id="item_id" name="item_id" required>
                                        <option value="" disabled selected>Select Item</option>
                                        @foreach($items as $item)
                                            <option value="{{ $item->id }}">{{ $item->item_name }}</option>
                                        @endforeach
                                    </select>
                                    @error('item_id')
                                        <span style="color:red;">{{ $message }}</span>
                                    @enderror
                                </div>
                            </div>

                            <div class="row mb-3">
                                <div class="col-md-12">
                                    <label for="state" class="form-label">State</label>
                                    <select class="form-control" id="state" name="state" required>
                                        <option value="" disabled selected>Select State</option>
                                        <option value="1">Wished</option>
                                        <option value="0">Not Wished</option>
                                    </select>
                                    @error('state')
                                        <span style="color:red;">{{ $message }}</span>
                                    @enderror
                                </div>
                            </div>

                            <div class="text-center">
                                <button type="submit" class="btn btn-primary px-5">Add to Wishlist</button>
                                <a href="{{ route('admin.wishList.index') }}" class="btn btn-secondary px-5">Cancel</a>
                            </div>
                        </form>

                    </div>
                </div>

            </div>
        </div>
    </section>

</main><!-- End #main -->

@endsection
