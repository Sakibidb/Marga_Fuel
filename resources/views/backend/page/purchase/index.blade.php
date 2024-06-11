@extends('backend.layout.app')
@section('title', 'Purchase List')
@section('content')

<div class="main-content">
    <div class="main-content-inner">
        <div class="breadcrumbs ace-save-state" id="breadcrumbs">
            <ul class="breadcrumb">
                <li>
                    <i class="ace-icon fa fa-home home-icon"></i>
                    <a href="#">Home</a>
                </li>
                <li class="active">Purchase List</li>
            </ul>

            <div class="nav-search" id="nav-search">
                <form class="form-search">
                    <span class="input-icon">
                        <input type="text" placeholder="Search ..." class="nav-search-input" id="nav-search-input" autocomplete="off" />
                        <i class="ace-icon fa fa-search nav-search-icon"></i>
                    </span>
                </form>
            </div>
        </div>

        <div class="page-content">
            <div class="row">
                <div class="col-sm-12">
                    <div class="widget-box" style="border: none">
                        <div class="widget-header">
                            <h4 class="widget-title">
                                <div class="d-flex" style="display: flex;justify-content: space-between">
                                    <span>
                                        <i class="fa fa-list"></i> Purchase List
                                    </span>
                                    <a href="{{ route('purchase.create') }}" class="float-right">
                                        <i class="fa fa-pencil-square-o"></i> Create Purchase
                                    </a>
                                </div>
                            </h4>
                        </div>

                        <div class="mt-2">
                            <div>
                                <table class="table table-striped table-bordered table-hover new-table">
                                    <thead>
                                        <tr>
                                            <th>ID</th>
                                            <th>Supplier</th>
                                            <th>Warehouse</th>
                                            <th>Product</th>
                                            <th>Total Quantity</th>
                                            <th>Total Amount</th>
                                            <th>Date</th>
                                            <th>Actions</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @foreach($purchases as $purchase)
                                        <tr>
                                            <td>{{ $purchase->id }}</td>
                                            <td>{{ $purchase->supplier->name ?? '' }}</td>
                                            <td>{{ $purchase->warehouse->name ?? ''}}</td>
                                            <td>{{ $purchase->product->name ?? '' }}</td>
                                            <td>{{ $purchase->qty_total }}</td>
                                            <td>{{ $purchase->total_amount }}</td>
                                            <td>{{ $purchase->date }}</td>
                                            <td class="text-center">
                                                <a href="{{ route('purchase.edit', $purchase->id) }}" class="btn btn-xs btn-success bs-tooltip" title="Edit">
                                                    <i class="fa fa-edit"></i>
                                                </a>
                                                <form action="{{ route('purchase.destroy', $purchase->id) }}" method="POST" style="display:inline" onsubmit="return confirm('Are you sure you want to delete this purchase?');">
                                                    @csrf
                                                    @method('DELETE')
                                                    <button type="submit" class="btn btn-xs btn-danger bs-tooltip" title="Delete">
                                                        <i class="fa fa-trash"></i>
                                                    </button>
                                                </form>
                                            </td>
                                            
                                        </tr>
                                        @endforeach
                                    </tbody>
                                </table>
                                <div align="center">
                                    {{ $purchases->links() }}
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
