@extends('backend.layout.app')
@section('title', 'E-Commerce Site')
@section('content')

<div class="container">
    <h2>All Categories</h2>

    @if(session()->has('success'))
        <div class="alert alert-success">
            {{ session('success') }}
        </div>
    @endif

    {{-- <a href="{{ route('categories.create') }}" class="btn btn-success">Add New Category</a> --}}

    <div class="page-header">
        <h4 class="page-title"><i class="fa fa-list"></i> Category List</h4>
        <div class="btn-group">
            <a class="btn btn-sm btn-primary" href="javascript:void(0)" onclick="excel()">
                <i class="fa fa-file-excel-o"></i>
                Excel
            </a>
            <a class="btn btn-sm btn-primary" href="{{ route('categories.create') }}">
                <i class="fa fa-plus-circle"></i>
                Add New Category
            </a>
        </div>
    </div>

    <table id="dynamic-table" class="table table-striped table-bordered table-hover">
        <thead>
            <tr>
                <th>ID</th>
                <th>Category Name</th>
                <th>Action</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($categories as $category)
            <tr>
                <td>{{ $category->id }}</td>
                <td>{{ $category->name }}</td>
                <td>
                    <div class="hidden-sm hidden-xs action-buttons">
                        {{-- <a class="blue" href="#">
                            <i class="ace-icon fa fa-search-plus bigger-130"></i>
                        </a> --}}
                        <a class="green" href="{{ route('categories.edit', $category->id) }}">
                            <i class="ace-icon fa fa-pencil bigger-130"></i>
                        </a>
                        <form method="POST" action="{{ route('categories.destroy', $category->id) }}">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="red" onclick="return confirm('Are you sure?')">
                                <i class="ace-icon fa fa-trash-o bigger-130"></i>
                            </button>
                        </form>
                    </div>
                </td>
            </tr>
            @endforeach
        </tbody>
    </table>
</div>

@endsection
