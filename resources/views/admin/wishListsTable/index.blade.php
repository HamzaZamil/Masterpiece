@extends('admin.source.template')

@section('content')

<main id="main" class="main">

    <div class="pagetitle">
        <h1>Wishlist</h1>
        <nav>
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="/">Home</a></li>
                <li class="breadcrumb-item active">Wishlist Table</li>
            </ol>
        </nav>
    </div><!-- End Page Title -->

    <section class="section">
        <div class="row">
            <div class="col-lg-12">

                <div class="card">
                    <div class="card-body">

                        <h2 class="text-center mb-4">Wishlist Table</h2>

                        <!-- Add Wishlist Item Button -->
                        <div class="text-end mb-3">
                            <button class="btn btn-success" onclick="location.href = '{{ route('admin.wishList.addWishList') }}'">
                                <i class="bi bi-plus-circle"></i> Add to Wishlist
                            </button>
                        </div>

                        <!-- Wishlist Table -->
                        <div class="table-responsive">
                            <table class="table table-striped table-hover">
                                <thead class="table-dark">
                                    <tr>
                                        <th>User Name</th>
                                        <th>Item Name</th>
                                        <th>State</th>
                                        <th>Actions</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach($wishlists as $wishlist)
                                    <tr>
                                        <td>{{ $wishlist->user->name }}</td>
                                        <td>{{ $wishlist->item->item_name }}</td>
                                        <td>{{ $wishlist->state }}</td>
                                        <td class="d-flex">
                                            <a href="{{ route('admin.wishList.editWishList', $wishlist->wishlist_id) }}" class="btn btn-warning me-2"><i class="bi bi-pencil-square"></i></a>
                                            <form action="{{ route('admin.wishList.deleteWishList', $wishlist->wishlist_id) }}" method="POST">
                                                @csrf
                                                @method('DELETE')
                                                <button type="submit" class="btn btn-danger" onclick="return confirm('Are you sure?')"><i class="bi bi-trash3-fill"></i></button>
                                            </form>
                                        </td>
                                    </tr>
                                    @endforeach
                                </tbody>
                            </table>
                        </div>

                    </div>
                </div>

            </div>
        </div>
    </section>

</main><!-- End #main -->

@endsection
