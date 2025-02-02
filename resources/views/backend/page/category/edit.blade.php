@extends('backend.layout.app')
@section('title', 'E-Commerce Site')
@section('content')

<div class="container">
    <h2>Edit Category</h2>

    @if ($errors->any())
        <div class="alert alert-danger">
            <ul>
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif

    <form method="POST" action="{{ route('categories.update', $category->id) }}" enctype="multipart/form-data">
        @csrf
        @method('PUT')

        <div class="form-group">
            <label for="name">Category Name</label>
            <input type="text" class="form-control" id="name" name="name" value="{{ $category->name }}">
        </div>

        <button type="submit" class="btn btn-primary">Update Category</button>
    </form>
</div>

@endsection
