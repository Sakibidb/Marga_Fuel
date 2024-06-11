@extends('backend.layout.app')
@section('title', 'E-Commerce Site')
@section('content')


<div class="main-content">
    <div class="main-content-inner">
        <div class="page-content">

            <div class="breadcrumbs ace-save-state" id="breadcrumbs">
                <h4 class="pl-2"> Add Customer </h4>
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

            @if(session()->has('success'))
            <div class="alert alert-success">
                {{ session('success') }}
            </div>
            @endif

            <div class="row">
                <div class="col-12">
                    <div class="widget-body">
                        <div class="widget-main">

                            <form class="form-horizontal mt-2" action="{{ route('customer.store') }}" method="POST">
                                @csrf
                                <div class="row" style="margin-bottom: 30px">
                                    <div class="col-lg-5" style="margin-left: 80px">

                                        

                                        <div class="form-group mb-1">
                                            <div class="input-group width-100">
                                                <span class="input-group-addon width-35" style="text-align: left"> Name <span class="label-required">*</span></span>
                                                <input type="text" class="form-control" name="name" id="name" value="{{ old('name') }}" required>
                                            </div>
                                        </div>

                                        <div class="form-group mb-1">
                                            <div class="input-group width-100">
                                                <span class="input-group-addon width-35" style="text-align: left"> Phone <span class="label-required">*</span></span>
                                                <input type="text" class="form-control" name="phone" id="phone" value="{{ old('phone') }}" required>
                                            </div>
                                        </div>

                                        <div class="form-group mb-1">
                                            <div class="input-group width-100">
                                                <span class="input-group-addon width-35" style="text-align: left"> Email</span>
                                                <input type="email" class="form-control" name="email" id="email" value="{{ old('email') }}">
                                            </div>
                                        </div>

                                        {{-- <div class="form-group mb-1">
                                            <div class="input-group width-100">
                                                <span class="input-group-addon width-35" style="text-align: left"> Gender</span>
                                                <select class="form-control select2" name="gender" id="gender" style="width: 100%">
                                                    <option value="" selected>--- Select ---</option>
                                                    <option value="Male">Male</option>
                                                    <option value="Female">Female</option>
                                                    <option value="Others">Others</option>
                                                </select>
                                            </div>
                                        </div> --}}

                                        {{-- <div class="form-group mb-1">
                                            <div class="input-group width-100">
                                                <span class="input-group-addon width-35" style="text-align: left"> Password *</span>
                                                <input type="password" class="form-control" name="password" id="password" required>
                                            </div>
                                        </div> --}}

                                        <div class="form-group mb-1">
                                            <div class="row">

                                                <div class="col-md-6">
                                                    <label class="col-sm-3 col-xs-4 control-label" for="form-field-1-1" style="margin-left:-12px"> Status </label>
                                                    <div class="col-sm-8 col-xs-8">
                                                        <label style="margin-top: 7px">
                                                            <input name="status" class="ace ace-switch ace-switch-6" type="checkbox" checked>
                                                            <span class="lbl"></span>
                                                        </label>
                                                    </div>
                                                </div>

                                                <div class="col-md-6">
                                                    <label class="col-sm-3 col-xs-4 control-label" for="form-field-1-1" style="margin-left:-12px"> Default </label>
                                                    <div class="col-sm-8 col-xs-8">
                                                        <label style="margin-top: 7px">
                                                            <input name="is_default" class="ace ace-switch ace-switch-6" type="checkbox" checked>
                                                            <span class="lbl"></span>
                                                        </label>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-lg-5" style="margin-left: 30px; margin-right: 60px">

                                        <div class="form-group mb-1">
                                            <div class="input-group width-100">
                                                <span class="input-group-addon width-35" style="text-align: left"> Address </span>
                                                <textarea name="address" id="address" class="form-control" rows="3">{{ old('address') }}</textarea>
                                            </div>
                                        </div>

                                        <div class="form-group mb-1">
                                            <div class="input-group width-100">
                                                <span class="input-group-addon width-35" style="text-align: left"> Shipping Address </span>
                                                <textarea name="shipping_address" id="shipping_address" class="form-control" rows="3">{{ old('shipping_address') }}</textarea>
                                            </div>
                                        </div>

                                       

                                        <div class="form-group mb-1">
                                            <div class="input-group width-100">
                                                <span class="input-group-addon width-35" style="text-align: left">Country</span>
                                                <select name="country" id="country" class="form-control select2" style="width: 100%">
                                                    <option value="" selected>--- Select ---</option>
                                                    @foreach($countries as $country)
                                                        <option value="{{ $country->id }}">{{ $country->short_name }}</option>
                                                    @endforeach
                                                </select>
                                            </div>
                                        </div>
                                        

                                    </div>
                                </div>

                                <div class="form-group mb-1">
                                    <div class="col-sm-11 text-right" style="margin-left: 24px;">
                                        <div class="btn-group">
                                            <button type="submit" class="btn btn-sm btn-success"> <i class="fa fa-save"></i> Submit </button>
                                            <a href="{{ route('customer.index') }}" class="btn btn-sm btn-info"> <i class="fa fa-list"></i> List </a>
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
