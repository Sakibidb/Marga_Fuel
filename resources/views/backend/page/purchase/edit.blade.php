@extends('backend.layout.app')
@section('title', 'Edit Purchase')
@section('content')

<div class="main-content">
    <div class="main-content-inner">
        <div class="breadcrumbs ace-save-state" id="breadcrumbs">
            <ul class="breadcrumb">
                <li>
                    <i class="ace-icon fa fa-home home-icon"></i>
                    <a href="#">Home</a>
                </li>
                <li class="active">Edit Purchase</li>
            </ul>
        </div>

        <div class="page-content">
            <div class="row">
                <div class="col-sm-12">
                    <div class="widget-box" style="border: none">
                        <div class="widget-header">
                            <h4 class="widget-title">Edit Purchase</h4>
                        </div>

                        <div class="mt-2">
                            <form action="{{ route('purchase.update', $purchase->id) }}" method="POST">
                                @csrf
                                @method('PUT')
                                <div class="form-group">
                                    <label for="supplier_id">Supplier</label>
                                    <select name="supplier_id" class="form-control" required>
                                        @foreach($suppliers as $supplier)
                                            <option value="{{ $supplier->id }}" {{ $supplier->id == $purchase->supplier_id ? 'selected' : '' }}>{{ $supplier->name }}</option>
                                        @endforeach
                                    </select>
                                </div>
                                <div class="form-group">
                                    <label for="warehouse_id">Warehouse</label>
                                    <select name="warehouse_id" class="form-control" required>
                                        @foreach($warehouses as $warehouse)
                                            <option value="{{ $warehouse->id }}" {{ $warehouse->id == $purchase->warehouse_id ? 'selected' : '' }}>{{ $warehouse->name }}</option>
                                        @endforeach
                                    </select>
                                </div>
                                <div class="form-group">
                                    <label for="product_id">Product</label>
                                    <select name="product_id" class="form-control" required>
                                        @foreach($products as $product)
                                            <option value="{{ $product->id }}" {{ $product->id == $purchase->product_id ? 'selected' : '' }}>{{ $product->name }}</option>
                                        @endforeach
                                    </select>
                                </div>
                                <div class="form-group">
                                    <label for="total_quantity">Total Quantity</label>
                                    <input type="number" name="total_quantity" class="form-control" value="{{ $purchase->qty_total }}" required>
                                </div>
                                <div class="form-group">
                                    <label for="date">Date</label>
                                    <input type="date" name="date" class="form-control" value="{{ $purchase->date }}" required>
                                </div>
                                <div class="form-group">
                                    <label for="payable_amount">Total Amount</label>
                                    <input type="number" name="payable_amount" class="form-control" value="{{ $purchase->total_amount }}" required>
                                </div>
                                <div class="form-group">
                                    <button type="submit" class="btn btn-success">Update Purchase</button>
                                    <a href="{{ route('purchase.index') }}" class="btn btn-secondary">Cancel</a>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
