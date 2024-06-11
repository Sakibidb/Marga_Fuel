@extends('backend.layout.app')
@section('title', 'Marga')
@section('content')

<div class="main-content">
    <div class="main-content-inner">
        <div class="breadcrumbs ace-save-state" id="breadcrumbs">
            <ul class="breadcrumb">
                <li>
                    <i class="ace-icon fa fa-home home-icon"></i>
                    <a href="#">Home</a>
                </li>
                <li class="active">Stock</li>
                <li class="active">Adjustments</li>
            </ul>

            <div class="nav-search" id="nav-search">
                <form class="form-search">
                    <span class="input-icon">
                        <input type="text" placeholder="Search ..." class="nav-search-input" id="nav-search-input" autocomplete="off" />
                        <i class="ace-icon fa fa-search nav-search-icon"></i>
                    </span>
                </form>
            </div><!-- /.nav-search -->
        </div>

        <div class="page-content">
            <div class="row">

                <div class="col-sm-12">
                    <div class="widget-box" style="border: none">
                        <div class="widget-header">
                            <h4 class="widget-title">
                                <div class="d-flex" style="display: flex;justify-content: space-between">
                                    <span>
                                        <i class="fa fa-list"></i> Adjustments
                                    </span>
                                    <a href="{{ route('adjustment.create') }}" class="float-right">
                                        <i class="fa fa-pencil-square-o"></i>Create Adjustments
                                    </a>
                                </div>
                            </h4>
                            <span class="widget-toolbar">
                            </span>
                        </div>

                        <div class=" mt-2">
                            <div class="">
                                <table class="table table-striped table-bordered table-hover new-table">
                                    <thead>
                                        <tr>
                                            <th>ID</th>
                                            <th>Product</th>
                                            <th>Quantity</th>
                                            <th>Reason</th>
                                            <th>Warehouse</th>
                                            <th>Date</th>
                                            <th>Adjusted By</th>
                                            <th>Actions</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @foreach($adjustments as $adjustment)
                                        <tr>
                                            <td>{{ $adjustment->id }}</td>
                                            {{-- <td>{{ $adjustment->product->name }}</td> --}}
                                            <td>{{ $adjustment->quantity }}</td>
                                            <td>{{ $adjustment->reason }}</td>
                                            {{-- <td>{{ $adjustment->warehouse->name ?? '' }}</td> --}}
                                            <td>{{ $adjustment->created_at }}</td>
                                            {{-- <td>{{ $adjustment->user->name }}</td> --}}
                                            <td>
                                                <!-- Actions (Edit/Delete) -->
                                                <a href="{{ route('adjustment.edit', $adjustment->id) }}" class="btn btn-sm btn-warning">
                                                    <i class="fa fa-edit"></i> Edit
                                                </a>
                                                <form action="{{ route('adjustment.destroy', $adjustment->id) }}" method="POST" style="display:inline-block;">
                                                    @csrf
                                                    @method('DELETE')
                                                    <button type="submit" class="btn btn-sm btn-danger" onclick="return confirm('Are you sure you want to delete this adjustment?');">
                                                        <i class="fa fa-trash"></i> Delete
                                                    </button>
                                                </form>
                                            </td>
                                        </tr>
                                        @endforeach
                                    </tbody>
                                </table>
                                </table>
                                <div align="center">
                                    {{-- {{$adjustments->links()}} --}}
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

    </div>
</div>
@endsection
