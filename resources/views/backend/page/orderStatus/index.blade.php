@extends('backend.layout.app')
@section('title', 'E-Commerce Site')

@section('content')
    <div class="main-content">
        <div class="main-content-inner">
            <div class="page-content">
                <div class="page-header">
                    <h4 class="page-title"><i class="fa fa-list"></i>Status Update</h4>
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
                            <div class="col-12">
                                <form class="form-horizontal mt-2" action="{{ route('status.update',$order->id) }}"
                                    method="POST" enctype="multipart/form-data">
                                    @csrf
                                    @method('put')
                                    <table class="table table-bordered table-hover fixed-table-header">
                                        <thead>
                                            <tr class="table-header-bg">
                                                <th width="10%" class="text-center">Order ID</th>
                                                <th width="10%" class="text-center">Customer</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <tr>
                                                <td width="10%" class="text-center">{{ $order->id}}</td>
                                                <td width="10%" class="text-center">{{  $order->customer}}</td>
                                            </tr>
                                        </tbody>
                                    </table>
                                    <div class="row" style="margin-bottom: 30px">
                                        <div class="col-lg-5" style="margin-left: 80px">
                                            <div class="form-group mb-1">
                                                <div class="input-group width-100">
                                                    <span class="input-group-addon width-35" style="text-align: left">
                                                        Status <span class="label-required"
                                                            style="color: red">*</span></span>
                                                    <select name="status" id="status" class="form-control">
                                                        @if($order->current_status == "Delivered")
                                                        
                                                        @endif
                                                        <option value="Pending"> Pending</option>
                                                        <option value="Accepted"> Accepted</option>
                                                        <option value="Poocessing"> Poocessing</option>
                                                        <option value="On the way"> On the way</option>
                                                        <option value="Delivered"> Delivered</option>
                                                        <option value="Cancelled"> Cancelled</option>
                                                        <option value="Return"> Return</option>
                                                    </select>
                                                </div>
                                            </div>

                                            <input type="hidden"  value="{{ $id ?? '' }}" name="order_id" id="order_id">

                                            {{-- <div class="form-group mb-1">
                                                <div class="input-group width-100">
                                                    <span class="input-group-addon width-35" style="text-align: left">
                                                        Assign Delivery Man <span class="label-required" style="color: red">*</span>
                                                    </span>
                                                    <input type="text" class="form-control" name="Assign_delivery_man" id="Assign_delivery_man"
                                                        value="" required>
                                                </div>
                                            </div> --}}

                                        </div>
                                    </div>
                                    <div class="form-group mb-1">
                                        <div class="col-sm-11 text-right" style="margin-left: 24px;">
                                            <div class="btn-group">
                                                <button class="btn btn-sm btn-success"> <i class="fa fa-save"></i>
                                                    Submit </button>
                                            </div>
                                        </div>
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
