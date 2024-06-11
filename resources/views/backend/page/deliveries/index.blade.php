@extends('backend.layout.app')
@section('title', 'E-Commerce Site')
@section('content')

    <div class="main-content">
        <div class="main-content-inner">
            <div class="page-content">

                <div class="page-header">
                    <h4 class="page-title"><i class="fa fa-list"></i> Delivery List</h4>
                    <div class="btn-group">
                        <a class="btn btn-sm btn-primary hidden-print" href="" target="_blank">
                            <i class="fa fa-file-excel-o"></i>
                            Excel
                        </a>
                        <a class="btn btn-sm btn-primary" href="{{ route('delivery.create') }}">
                            <i class="fa fa-plus-circle"></i>
                            Add New Delivery
                        </a>

                    </div>
                </div>
                <div class="row">

                    <div class="col-sm-12">
                        <div class="table-responsive">
                            <table class="table table-bordered table-hover fixed-table-header">
                                <thead>
                                    <tr class="table-header-bg">
                                        <th width="5%" class="text-center">SL</th>
                                        <th width="10%" class="text-center">Customer</th>
                                        <th width="15%" class="text-center">Customer ID</th>
                                        <th width="13%" class="text-center">Warehouse</th>
                                        <th width="13%" class="text-center">Driver Name</th>
                                        <th width="13%" class="text-center">Delivery Date</th>
                                        <th width="10%" class="text-center">Status</th>
                                        <th width="7%" class="text-center">Action</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($deliveries as $delivery)
                                        <tr>
                                            @if($delivery->vehicleAssign == NULL)

                                            @else
                                            <td>{{ $loop->iteration }}</td>
                                            <td>{{ $delivery->customer }}</td>
                                            <td>{{ $delivery->customer_id }}</td>
                                            <td>{{ optional($delivery->warehouse)->name }}</td>
                                            <td>{{ optional(optional($delivery->vehicleAssign)->driver)->name }}</td>
                                            <td>{{ $delivery->delivery_date }}</td>
                                            <td>{{ $delivery->status }}</td>

                                    {{-- @foreach ($deliveries as $delivery) --}}
                                    
                                            <td class="text-center">
                                                <div class="dropdown">
                                                    <a href="javascript:void(0)" class="text-danger fa fa-ellipsis-v"
                                                        type="button" data-toggle="dropdown"></a>
                                                    <ul class="dropdown-menu dropdown-menu-right">
                                                        <li>
                                                            <a href="{{ route('delivery.edit', $delivery->id) }}"
                                                                title="Edit">
                                                                <i class="fa fa-pencil-square-o"></i> Edit
                                                            </a>
                                                        </li>
                                                    </ul>
                                                </div>
                                            </td>
                                            @endif

                                        </tr>
                                    @endforeach
                                </tbody>
                            </table>

                            <span class="pull-right" style="margin-right: 1px">
                                <ul class="pagination">
                                    <li class="  disabled ">
                                        <a class href="">← First</a>
                                    </li>
                                    <li class="  disabled ">
                                        <a class href><i class="fa fa-angle-double-left"></i></a>
                                    </li>
                                    <li class="active"><span>1</span></li>

                                    <li class=" ">
                                        <a class href=""><i class="fa fa-angle-double-right"></i></a>
                                    </li>
                                    <li class=" ">
                                        <a class href="">Last →</a>
                                    </li>
                                </ul>
                            </span>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

@endsection
