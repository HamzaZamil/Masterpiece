@extends('admin.source.template')

@section('content')

<main id="main" class="main">

    <div class="pagetitle">
        <h1>Edit Category</h1>
        <nav>
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="/">Home</a></li>
                <li class="breadcrumb-item active">Edit Category</li>
            </ol>
        </nav>
    </div><!-- End Page Title -->

    <section class="section">
        <div class="row">
            <div class="col-lg-12">

                <div class="card">
                    <div class="card-body">
                       

                        <h2 class="text-center mb-4">Edit Category</h2>
                        {{-- @if ($errors->all())
                        <div>
                            <ul>
                                @foreach ($errors->all() as $error)
                                    <li class="text-danger">
                                        {{ $error }}
                                    </li>
                                @endforeach
                            </ul>
                        </div>
                    @endif --}}
                       
                        <form action="{{route('admin.categories.updateCategory', $category->category_id)}}" method="POST" class="p-4">
                            
                            @csrf
                            @method('PATCH')
                            <div class="row mb-3">
                                <div class="col-md-6">
                                    <label for="category_name" class="form-label">Category Name</label>
                                    <input type="text" class="form-control" id="category_name" name="category_name" value="{{ old('category_name', $category->category_name) }}" required>
                                    @error('category_name')
                                        <span style="color:red;">{{$message}}</span>
                                    @enderror
                                </div>
                                <div class="col-md-6">
                                    <label for="category_description" class="form-label">Category Description</label>
                                    <input type="text" class="form-control" id="category_description" name="category_description" value="{{ old('category_description', $category->category_description) }}" required>
                                    @error('category_description')
                                        <span style="color:red;">{{ $message }}</span>
                                    @enderror
                                </div>
                                <div class="mb-3">
                                    <label for="category_picture" class="form-label">Category Picture</label>
                                    <input type="file" class="form-control" id="category_picture" name="category_picture">
                                    @if($category['category_picture'])
                                        <img src="{{ asset('storage/categories/' . $category['category_picture']) }}" alt="category Picture" class="mt-2" style="width: 150px; height: auto;">
                                    @endif
                                </div>
                            </div>
                        
                            
                        
                            <div class="text-center">
                                <button type="submit" class="btn btn-primary px-5">Save Changes</button>
                                <a href="categories_table.php" class="btn btn-secondary px-5">Cancel</a>
                            </div>
                        </form>

                    </div>
                </div>

            </div>
        </div>
    </section>

</main><!-- End #main -->

@endsection