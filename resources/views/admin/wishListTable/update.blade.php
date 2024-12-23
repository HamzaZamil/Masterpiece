@extends('admin.source.template')

@section('content')

<main id="main" class="main">

    <div class="pagetitle">
        <h1>Update Wishlist</h1>
        <nav>
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="{{ route('admin.wishList.index') }}">Home</a></li>
                <li class="breadcrumb-item"><a href="{{ route('admin.wishList.index') }}">Wishlist</a></li>
                <li class="breadcrumb-item active">Update Wishlist</li>
            </ol>
        </nav>
    </div><!-- End Page Title -->

    <section class="section">
        <div class="row">
            <div class="col-lg-12">

                <div class="card">
                    <div class="card-body">

                        <h2 class="text-center mb-4">Update Wishlist Entry</h2>

                        @if ($errors->all())
        <div>
            <ul>
                @foreach ($errors->all() as $error)
                    <li class="text-danger">
                        {{ $error }}
                    </li>
                @endforeach
            </ul>
        </div>
    @endif
                        <form action="{{ route('admin.wishList.updateWishList', $wishlist->wishlist_id) }}" method="POST" class="p-4">
                            @csrf
                            @method('PATCH')

                            <div class="row mb-3">
                                <div class="col-md-12">
                                    <label for="user_id" class="form-label">User</label>
                                    <select class="form-control" id="user_id" name="user_id" disabled>
                                        <option value="" disabled>Select User</option>
                                        @foreach($users as $user)
                                            <option value="{{ $user->id }}" {{ $wishlist->user_id == $user->id ? 'selected' : '' }}>
                                                {{ $user->name }} {{ $user->last_name }}
                                            </option>
                                        @endforeach
                                    </select>
                                </div>
                            </div>

                            <div class="row mb-3">
                                <div class="col-md-12">
                                    <label for="item_id" class="form-label">Item</label>
                                    <select class="form-control" id="item_id" name="item_id" disabled>
                                        <option value="" disabled>Select Item</option>
                                        @foreach($items as $item)
                                            <option value="{{ $item->id }}" {{ $wishlist->item_id == $item->id ? 'selected' : '' }}>
                                                {{ $item->item_name }}
                                            </option>
                                        @endforeach
                                    </select>
                                </div>
                            </div>

                            <div class="row mb-3">
                                <div class="col-md-12">
                                    <label for="state" class="form-label">State</label>
                                    <select class="form-control" id="state" name="state" required>
                                        <option value="1" {{ $wishlist->state == 1 ? 'selected' : '' }}>Wished</option>
                                        <option value="0" {{ $wishlist->state == 0 ? 'selected' : '' }}>Not Wished</option>
                                    </select>
                                    @error('state')
                                        <span style="color:red;">{{ $message }}</span>
                                    @enderror
                                </div>
                            </div>

                            <div class="text-center">
                                <button type="submit" class="btn btn-primary px-5">Update Wishlist</button>
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
