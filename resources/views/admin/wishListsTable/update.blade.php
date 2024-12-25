@extends('admin.source.template')

@section('content')

<main id="main" class="main">

    <div class="pagetitle">
        <h1>Edit Wishlist Status</h1>
        <nav>
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="{{ route('admin.wishList.index') }}">Home</a></li>
                <li class="breadcrumb-item"><a href="{{ route('admin.wishList.index') }}">Wishlist</a></li>
                <li class="breadcrumb-item active">Edit Status</li>
            </ol>
        </nav>
    </div><!-- End Page Title -->

    <section class="section">
        <div class="row">
            <div class="col-lg-6 offset-lg-3">


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


                <div class="card">
                    <div class="card-body">
                        <h2 class="text-center mb-4">Edit Wishlist Status</h2>

                        

                        <form action="{{ route('admin.wishList.updateWishList', $wishlist->wishlist_id) }}" method="POST">
                            @csrf
                            @method('PATCH')
                        
                            <!-- State Selection -->
                            <div class="mb-3">
                                <label for="state" class="form-label">State</label>
                                <select name="state" id="state" class="form-control" required>
                                    <option value="in_wishlist" {{ $wishlist->state === 'in_wishlist' ? 'selected' : '' }}>In Wishlist</option>
                                    <option value="not_in_wishlist" {{ $wishlist->state === 'not_in_wishlist' ? 'selected' : '' }}>Not In Wishlist</option>
                                </select>
                            </div>
                        
                            <!-- Submit Button -->
                            <div class="text-end">
                                <button type="submit" class="btn btn-success">
                                    <i class="bi bi-check-circle"></i> Update Status
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
