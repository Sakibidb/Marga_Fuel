@extends('backend.layout.app')
@section('title', 'E-Commerce Site')
@php
    // Initialize balance quantity
    $balanceQty = 0;
    $balanceAmt =0;
@endphp
@section('content')
    <div class="main-content">
        <div class="main-content-inner">
            <div class="page-content">
                <div class="page-header">
                    <h4 class="page-title"><i class="fa fa-list"></i> Item Ledger</h4>
                </div>
                @if ($errors->any())
                    <div class="alert alert-danger">
                        <ul>
                            @foreach ($errors->all() as $error)
                                <li>{{ $error }}</li>
                            @endforeach
                        </ul>
                    </div>
                @endif

                @if (session()->has('success'))
                    <div class="alert alert-success">
                        {{ session('success') }}
                    </div>
                @endif
                <div class="mt-2">
                    <div class="mt-2 ">
                        <div class="row">
                            <div class="col-sm-12">
                                <form action="{{ route('item_ledger.search') }}" method="GET">
                                    <table class="table table-bordered">
                                        <tr>
                                            <td colspan="4" width="80%">
                                                <div class="form-group text-center mb-0" width="75%">
                                                    <input type="text" class="form-control text-center search-product"
                                                        value="{{ request('p_name') ?? '' }}" name="p_name"
                                                        style="width: 75%;display: inline-block;"
                                                        placeholder="Search by Product Name">
                                                    <input type="hidden" class="form-control selected-product-id"
                                                        name="product_id">
                                                    <div style="position: relative;">
                                                        <div class="dropdown-content live-load-content"></div>
                                                    </div>
                                                </div>
                                            </td>
                                            <td width="20%" class="text-center">
                                                <div class="btn-group">
                                                    <button class="btn btn-sm btn-primary"
                                                        style="padding-top: 6px; padding-bottom: 6px;" type="submit">
                                                        <i class="fa fa-search"></i> SEARCH
                                                    </button>
                                                    <a href="{{ request()->url() }}" class="btn btn-sm btn-light"
                                                        style="width: 49%; padding-top: 6px; padding-bottom: 6px;">
                                                        <i class="fa fa-refresh"></i> REFRESH
                                                    </a>
                                                </div>
                                            </td>
                                        </tr>
                                        <tr>
                                            <td width="30%">
                                                <select name="warehouse_id" class="form-control select2" id="warehouse_id"
                                                    style="width: 100%">
                                                    <option selected value="">All Warehouse</option>
                                                    @foreach ($warehouses as $warehouse)
                                                        <option value="{{ $warehouse->id }}"
                                                            {{ request('warehouse_id') == $warehouse->id ? 'selected' : '' }}>
                                                            {{ $warehouse->name }}
                                                        </option>
                                                    @endforeach
                                                </select>
                                            </td>
                                            <td width="30%">
                                                <select name="supplier_id" class="form-control select2" id="supplier_id"
                                                    style="width: 100%">
                                                    <option selected value="">Select Supplier</option>
                                                    @foreach ($suppliers ?? [] as $supplier)
                                                        <option value="{{ $supplier->id }}"
                                                            {{ request('supplier_id') == $supplier->id ? 'selected' : '' }}>
                                                            {{ $supplier->name }} - {{ $supplier->mobile }}
                                                        </option>
                                                    @endforeach
                                                </select>
                                            </td>
                                            <td width="20%">
                                                <div class="input-group">
                                                    <input type="date" class="form-control date-picker text-center" name="from_date" value="{{ request('from_date') }}" autocomplete="off" placeholder="From Date" data-date-format="yyyy-mm-dd">
                                                    <span class="input-group-addon"><i class="fa fa-exchange"></i></span>
                                                    <input type="date" class="form-control date-picker text-center" name="to_date" value="{{ request('to_date') }}" autocomplete="off" placeholder="To Date" data-date-format="yyyy-mm-dd">
                                                </div>
                                            </td>
                                        </tr>
                                    </table>
                                </form>

                            </div>
                        </div>

                        {{-- Table portion start --}}
                        <div>
                            <table id="dynamic-table" class="table table-striped table-bordered table-hover">
                                <thead>
                                    <tr style="background: #e1ecff !important; color:black !important">
                                        <th width="5%" class="text-center">SI</th>
                                        <th width="12%" class="text-center">Product Name</th>
                                        <th width="7%" class="text-center">Unit</th>
                                        <th width="10%" class="text-center">Opening Qty</th>
                                        <th width="10%" class="text-center">Stock In Qty</th>
                                        <th width="9%" class="text-center">Stock Out Qty</th>
                                        <th width="8%" class="text-center">Balance Qty</th>
                                        <th width="10%" class="text-center">Date</th>
                                        <th width="10%" class="text-center">Opening Amt</th>
                                        <th width="10%" class="text-center">Stock In Amt</th>
                                        <th width="10%" class="text-center">Stock Out Amt</th>
                                        <th width="10%" class="text-center">Balance Amt</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($stocks as $stock)
                                        <tr>
                                            <td class="text-center">{{ $loop->iteration }}</td>
                                            <td class="text-center">{{ optional($stock->product)->name }} </td>
                                            <td class="text-center">Liters</td>
                                            <td class="text-right">{{ $stock->opening_qty }}</td>
                                            <td class="text-right">
                                                @if ($stock->stock_type == 'In')
                                                    @php
                                                        // Add the quantity to balance if stock type is 'In'
                                                        $balanceQty += $stock->quantity;
                                                    @endphp
                                                    {{ number_format($stock->quantity, 2) }}
                                                @else
                                                    0.00
                                                @endif
                                            </td>
                                            <td class="text-right">
                                                @if ($stock->stock_type == 'Out')
                                                    @php
                                                        // Subtract the quantity from balance if stock type is 'Out'
                                                        $balanceQty -= $stock->quantity;
                                                    @endphp
                                                    {{ number_format($stock->quantity, 2) }}
                                                @else
                                                    0.00
                                                @endif
                                            </td>
                                            <td class="text-right">{{ number_format($balanceQty, 2) }}</td>
                                            <td class="text-center">{{ $stock->date }}</td>
                                            <td class="text-right">{{ $stock->opening_amt }}</td>
                                            <td class="text-right">
                                                @php
                                                $balanceAmt -=$stock->purchase_total
                                            @endphp
                                                {{ $stock->purchase_total }}</td>
                                            <td class="text-right">
                                                @php
                                                $balanceAmt +=$stock->sale_price
                                            @endphp
                                                {{ $stock->sale_price }}</td>
                                            <td class="text-right">{{ number_format($balanceAmt, 2) }}</td>
                                        </tr>
                                    @endforeach
                                </tbody>
                            </table>
                        </div>
                        {{-- Table end --}}
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
