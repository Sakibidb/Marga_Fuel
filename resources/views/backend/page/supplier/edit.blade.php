@extends('backend.layout.app')
@section('title', 'E-Commerce Site')


@section('content')
    <div class="row ">
        <div class="col-sm-6 col-sm-offset-2">

            <!-- heading -->
            <div class="widget-box widget-color-white ui-sortable-handle clearfix" id="widget-box-7">

                <!-- heading -->
                <div class="widget-header widget-header-small">
                    <h3 class="widget-title smaller text-primary">
                        <i class="fa fa-plus-circle"></i> Supplier Update
                    </h3>

                    <div class="widget-toolbar">
                        <a href="{{ route('supplier.index') }}"><i class="fa fa-list-alt"></i> List</a>
                    </div>
                </div>

                <div class="space"></div>

                <!-- INPUTS -->
                <form action="{{ route('supplier.update', $supplier->id) }}" method="post">
                    @csrf
                    @method('PUT')
                    <div class="row" style="width: 100%; margin: 0 0 20px !important;">
                        <div class="col-sm-12 px-4">


                            <div class="form-group mb-1">
                                <div class="input-group width-80">
                                    <span class="input-group-addon width-35" style="text-align: left">
                                        Name <span class="label-required" style="color: red">*</span></span>
                                    <input type="text" class="form-control" name="name" id="name"
                                        value="{{ $supplier->name }}" required>
                                </div>
                            </div>

                            <div class="form-group mb-1">
                                <div class="input-group width-80">
                                    <span class="input-group-addon width-35" style="text-align: left">
                                        Mobile </span>
                                    <input type="text" class="form-control" name="mobile" id="mobile"
                                        value="{{ $supplier->mobile }}">
                                </div>
                            </div>


                            <div class="form-group mb-1">
                                <div class="input-group width-80">
                                    <span class="input-group-addon width-35" style="text-align: left">
                                        Email </span>
                                    <input type="email" class="form-control" name="email" id="email"
                                        value="{{ $supplier->email }}">
                                </div>
                            </div>

                            <div class="form-group mb-1">
                                <div class="input-group width-80">
                                    <span class="input-group-addon width-35" style="text-align: left">
                                        Address </span>
                                    <input type="text" class="form-control" name="address" id="address"
                                        value="{{ $supplier->address }}">
                                </div>
                            </div>

                            <button class="btn btn-primary btn-sm pull-right"><i class="fa fa-save"></i> Save</button>
                        </div>
                    </div>
                </form>

            </div>
        </div>
    </div>


@endsection
