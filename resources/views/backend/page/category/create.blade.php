@extends('backend.layout.app')
@section('title', 'E-Commerce Site')
@section('content')

<div class="container">
    <h2>Add New Category</h2>

    @if ($errors->any())
        <div class="alert alert-danger">
            <ul>
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif

    <form method="POST" action="{{ route('categories.store') }}" enctype="multipart/form-data">
        @csrf

        <div class="form-group">
            <label for="name">Category Name</label>
            <input type="text" class="form-control" id="name" name="name" value="{{ old('name') }}">
        </div>

        <button type="submit" class="btn btn-primary">Add Category</button>
    </form>
</div>

@endsection
