@extends('backend.layout.app')
@section('title', 'E-Commerce Site')
@section('content')


<div class="container">
    <h2>Add New Product</h2>

    @if ($errors->any())
    <div class="alert alert-danger">
        <ul>
            @foreach ($errors->all() as $error)
            <li>{{ $error }}</li>
            @endforeach
        </ul>
    </div>
    @endif

    @if(session()->has('success'))
    <div class="alert alert-success">
        {{ session('success') }}
    </div>
    @endif


    <form method="POST" action="{{ route('products.store') }}" enctype="multipart/form-data">
        @csrf

        <div class="col">
            <div class="form-group">
                <label for="category">Category</label>
                <select class="form-control" id="category" name="category">
                    <option value="">Select a category</option>
                    <!-- Assuming $categories is an array of category objects -->
                    @foreach ($categories as $category)
                    <option value="{{ $category->id }}">{{ $category->name }}</option>
                    @endforeach
                </select>
            </div>
        </div>

        <div class="col">
            <div class="form-group">
                <label for="product_name">Product Name</label>
                <input type="text" class="form-control" id="name" name="name" value="{{ old('name') }}">
            </div>
        </div>

        {{-- SL	Image	Name	Mfg. Model No	SKU	Category	Brand	MRP	Stock	Action --}}

        <div class="form-group">
            <label for="price">MRP</label>
            <input type="text" class="form-control" id="price" name="price" value="{{ old('price') }}">
        </div>

        <div class="form-group">
            <label for="sku">SKU</label>
            <input type="text" class="form-control" id="sku" name="sku" value="{{ old('sku') }}">
        </div>

        <div class="form-group">
            <label for="model">Model No</label>
            <input type="text" class="form-control" id="model" name="model" value="{{ old('model') }}">
        </div>

        <div class="form-group">
            <label for="brand">Brand</label>
            <input type="text" class="form-control" id="brand" name="brand" value="{{ old('brand') }}">
        </div>

        <div class="form-group">
            <label for="stock">Stock</label>
            <input type="text" class="form-control" id="stock" name="stock" value="{{ old('stock') }}">
        </div>

        <div class="form-group">
            <label for="image">Image</label>
            <input type="file" class="form-control-file" id="image" name="image">
        </div>



        <button type="submit" class="btn btn-primary">Add Product</button>
    </form>
</div>

@endsection
