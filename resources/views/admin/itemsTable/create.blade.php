@extends('admin.source.template')

@section('content')

<main id="main" class="main">

    <div class="pagetitle">
        <h1>Add New Item</h1>
        <nav>
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="/">Home</a></li>
                <li class="breadcrumb-item"><a href="{{ route('admin.items.index') }}">Items</a></li>
                <li class="breadcrumb-item active">Add Item</li>
            </ol>
        </nav>
    </div><!-- End Page Title -->

    <section class="section">
        <div class="row">
            <div class="col-lg-12">


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
                        <h2 class="text-center mb-4">Add New Item</h2>
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
    

                        <!-- Form for adding new item -->
                        <form action="{{ route('admin.items.storeItem') }}" method="POST" enctype="multipart/form-data">
                            @csrf

                            <div class="mb-3">
                                <label for="item_type" class="form-label">Item Type</label>
                                <select name="item_type" id="item_type" class="form-control @error('item_type') is-invalid @enderror">
                                    <option value="">Select Item Type</option>
                                    <option value="cat" {{ old('item_type') == 'Cat' ? 'selected' : '' }}>Cat</option>
                                    <option value="dog" {{ old('item_type') == 'Dog' ? 'selected' : '' }}>Dog</option>
                                    <option value="fish" {{ old('item_type') == 'Fish' ? 'selected' : '' }}>Fish</option>
                                    <option value="bird" {{ old('item_type') == 'Bird' ? 'selected' : '' }}>Bird</option>
                                </select>
                                @error('item_type')
                                    <div class="invalid-feedback">{{ $message }}</div>
                                @enderror
                            </div>

                            <div>
                                <!-- Category Selection -->
                                <select class="form-control" id="categoryId" name="category_id" required>
                                    <option value="" disabled selected>Select Category</option>
                                    @foreach ($categories as $category)
                                        <option value="{{ $category->category_id }}">{{ $category->category_name }}</option>
                                    @endforeach
                                </select>
                            </div>

                            <div class="mb-3">
                                <label for="item_name" class="form-label">Item Name</label>
                                <input type="text" name="item_name" id="item_name" class="form-control @error('item_name') is-invalid @enderror" value="{{ old('item_name') }}" required>
                                @error('item_name')
                                    <div class="invalid-feedback">{{ $message }}</div>
                                @enderror
                            </div>

                            <div class="mb-3">
                                <label for="item_description" class="form-label">Item Description</label>
                                <textarea name="item_description" id="item_description" rows="4" class="form-control @error('item_description') is-invalid @enderror" required>{{ old('item_description') }}</textarea>
                                @error('item_description')
                                    <div class="invalid-feedback">{{ $message }}</div>
                                @enderror
                            </div>

                            <div class="mb-3">
                                <label for="item_price" class="form-label">Item Price</label>
                                <input type="number" name="item_price" id="item_price" class="form-control @error('item_price') is-invalid @enderror" value="{{ old('item_price') }}" step="0.01" required>
                                @error('item_price')
                                    <div class="invalid-feedback">{{ $message }}</div>
                                @enderror
                            </div>

                            <div class="mb-3">
                                <label for="item_stock" class="form-label">Item Stock</label>
                                <input type="number" name="item_stock" id="item_stock" class="form-control @error('item_stock') is-invalid @enderror" value="{{ old('item_stock') }}" required>
                                @error('item_stock')
                                    <div class="invalid-feedback">{{ $message }}</div>
                                @enderror
                            </div>

                            <div class="mb-3">
                                <label for="item_picture" class="form-label">Item Picture (Optional)</label>
                                <input type="file" name="item_picture" id="item_picture" class="form-control @error('item_picture') is-invalid @enderror">
                                @error('item_picture')
                                    <div class="invalid-feedback">{{ $message }}</div>
                                @enderror
                            </div>

                            <div class="text-end">
                                <button type="submit" class="btn btn-success">Save Item</button>
                            </div>
                        </form>

                    </div>
                </div>

            </div>
        </div>
    </section>

</main><!-- End #main -->

@endsection

