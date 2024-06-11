@extends('backend.layout.app')
@section('title', 'E-Commerce Site')
@section('content')
    <div class="main-content">
        <div class="main-content-inner">
            <div class="page-content">
                <div class="page-header">
                    <h4 class="page-title"><i class="fa fa-list"></i> Oder List</h4>
                </div>
                <div class="row">
                    <div class="col-sm-12">
                        <div class="table-responsive">
                            <table class="table table-bordered table-hover fixed-table-header">
                                <thead>
                                    <tr class="table-header-bg">
                                        <th width="5%" class="text-center">SL</th>
                                        <th width="10%" class="text-center">Customer Name</th>
                                        <th width="10%" class="text-center">Phone</th>
                                        <th width="12%" class="text-center">Order Address</th>
                                        <th width="9%" class="text-center">Total</th>
                                        <th width="9%" class="text-center">Paid</th>
                                        <th width="9%" class="text-center">Due</th>
                                        <th width="9%" class="text-center">Product Name</th>
                                        <th width="9%" class="text-center">Quantity</th>
                                        <th width="13%" class="text-center">Payment Method</th>
                                        <th width="8%" class="text-center">Vehicle</th>
                                        <th width="8%" class="text-center">Delivery Man Name</th>
                                        <th width="8%" class="text-center">Payment Status</th>
                                        <th width="10%" class="text-center">Status</th>
                                        <th width="5%" class="text-center">Action</th>
                                    </tr>
                                </thead>
                                <tbody>

                                    @foreach ($weborders as $key => $weborder)
                                
                                        <tr>
                                            <td class="text-center">{{ $key + 1 }}</td>
                                            <td class="text-center">{{ @$weborder->customerInfo->name }}</td>
                                            <td class="text-center">{{ $weborder->customer }}</td>
                                            <td class="text-center">{{ $weborder->address }}</td>
                                            {{-- <td class="text-center">{{ $weborder->location }}</td> --}}
                                            <td class="text-center">{{ $weborder->totalAmount }}</td>
                                            <td class="text-center">{{ $weborder->paid_amount }}</td>
                                            <td class="text-center">{{ $weborder->due_amount }}</td>
                                            <td class="text-center">{{ $weborder->productName }}</td>
                                            <td class="text-center">{{ $weborder->quantity }}</td>
                                            <td class="text-center">{{ $weborder->paymentMethod }}</td>
                                            <td class="text-center">{{ $weborder->vehicle }}</td>
                                            <td> {{ optional(optional($weborder->vehicleAssign)->user)->name }}</td>
                                            {{-- <td class="text-center">{{ $weborder->vehicle_assign_id }}</td> --}}
                                            <td class="text-center">{{ $weborder->payment_status }}</td>
                                            <td class="text-center">{{ $weborder->current_status }}</td>
                                            <td class="text-center">
                                                <div class="dropdown">
                                                    <a href="javascript:void(0)" class="text-danger fa fa-ellipsis-v"
                                                        type="button" data-toggle="dropdown"></a>
                                                    <ul class="dropdown-menu dropdown-menu-right">
                                                        <li>
                                                            {{-- <a href="{{ route('delivery.edit', ['delivery' => $delivery->id]) }}">Edit</a> --}}

                                                            <a href="{{ route('delivery.edit', $weborder->id) }}">
                                                                <i class="fa fa fa-car"></i> Delivery
                                                            </a>
                                                        </li>
                                                        <li>
                                                            <a href="{{ route('status.edit', $weborder->id) }}">
                                                                <i class="fa fa-thumbs-up"></i> Status
                                                            </a>
                                                        </li>
                                                        <li>
                                                            <a href="javascript:void(0)" title="Delete"
                                                                onclick="event.preventDefault(); document.getElementById('delete-form-{{ $weborder->id }}').submit();"
                                                                type="button">
                                                                <i class="fa fa-trash"></i> Delete
                                                            </a>
                                                            <form id="delete-form-{{ $weborder->id }}"
                                                                action="{{ route('weborder.destroy', $weborder->id) }}"
                                                                method="POST" style="display: none;">
                                                                @csrf
                                                                @method('DELETE')
                                                            </form>
                                                        </li>
                                                    </ul>
                                                </div>
                                            </td>
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
