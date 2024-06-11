@extends('frontend.home.master')
@section('content')
    <div class="my-4 mx-5">
        <div class="row justify-content-center align-items-center" style="height: 200px;">
            <div class="card col-12 text-center">
                <div class="mt-2">
                    <div class="mt-2 ">
                        <div class="row">
                            <div class="col-12">
                                <form class="form-horizontal mt-2" action="{{ route('driverstatus.update', $order->id) }}"
                                    method="POST" enctype="multipart/form-data">
                                    @csrf
                                    @method('post')
                                    <table class="table table-bordered table-hover fixed-table-header">
                                        <thead>
                                            <tr class="table-header-bg">
                                                <th width="10%" class="text-center">Order ID</th>
                                                <th width="10%" class="text-center">Customer</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <tr>
                                                <td width="10%" class="text-center">{{ $order->id }}</td>
                                                <td width="10%" class="text-center">{{ $order->customer }}</td>
                                            </tr>
                                        </tbody>
                                    </table>
                                    <div class="row" style="margin-bottom: 30px">
                                        <div class="col-lg-5" style="margin-left: 24rem">
                                            <div class="form-group mb-1">
                                                <div class="input-group width-100">
                                                    <span class="input-group-addon width-35 mt-2 mr-2"
                                                        style="text-align: left">
                                                        Status Update <span class="label-required"
                                                            style="color: red">*</span></span>
                                                    <select name="status" id="status" class="form-control">
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
