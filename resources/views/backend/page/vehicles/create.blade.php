@extends('backend.layout.app')
@section('title', 'E-Commerce Site')
@section('content')


<div class="main-content">
    <div class="main-content-inner">
        <div class="page-content">
            <div class="breadcrumbs ace-save-state" id="breadcrumbs">
                <h4 class="pl-2">Add Vehicles</h4>
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
                            <form class="form-horizontal mt-2" action="{{ route('vehicles.store') }}" method="POST">
                                @csrf
                                <div class="row" style="margin-bottom: 30px">
                                    <div class="col-lg-5" style="margin-left: 80px">

                                        <div class="form-group mb-1">
                                            <div class="input-group width-100">
                                                <span class="input-group-addon width-35" style="text-align: left"> Vehicle Number <span class="label-required">*</span></span>
                                                <input type="text" class="form-control" name="vehicle_number" id="vehicle_number" value="{{ old('vehicle_number') }}" required>
                                            </div>
                                        </div>


                                        <div class="form-group mb-1">
                                            <div class="input-group width-100">
                                                <span class="input-group-addon width-35" style="text-align: left"> Vehicle Chassis Number <span class="label-required">*</span></span>
                                                <input type="text" class="form-control" name="chassis_number" id="chassis_number" value="{{ old('chassis_number') }}" required>
                                            </div>
                                        </div>


                                        <div class="form-group mb-1">
                                            <div class="input-group width-100">
                                                <span class="input-group-addon width-35" style="text-align: left">Vehicle Type</span>
                                                <select name="vehicle_type" id="vehicle_type" class="form-control select2" style="width: 100%" required>
                                                    <option value="" selected>--- Select Vehicle Type ---</option>
                                                    <option value="truck">Truck</option>
                                                    <option value="lorry">Lorry</option>
                                                    <option value="container">Container</option>
                                                    <option value="bycycle">Bycycle</option>
                                                    <option value="bike">Bike</option>
                                                </select>
                                            </div>
                                        </div>

                                        <div class="form-group mb-1">
                                            <div class="input-group width-100">
                                                <span class="input-group-addon width-35" style="text-align: left">Vehicle condition</span>
                                                <select name="condition" id="condition" class="form-control select2" style="width: 100%" required>
                                                    <option value="" selected>--- Select Vehicle Condition ---</option>
                                                    <option value="good">Good Condition</option>
                                                    <option value="bad">Bad Condition</option>
                                                    <option value="damage">Damage</option>
                                                </select>
                                            </div>
                                        </div>

                                        <div class="form-group mb-1">
                                            <div class="input-group width-100">
                                                <span class="input-group-addon width-35" style="text-align: left"> Capacity (Litter) <span class="label-required">*</span></span>
                                                <input type="text" class="form-control" name="capacity" id="capacity" value="{{ old('capacity') }}" required>
                                            </div>
                                        </div>

                                        {{-- <div class="form-group mb-1">
                                            <div class="input-group width-100">
                                                <span class="input-group-addon width-35" style="text-align: left"> Condition of Vehicle</span>
                                                <input type="text" class="form-control" name="condition" id="condition" value="{{ old('condition') }}">
                                            </div>
                                        </div> --}}

                                        {{-- <div class="form-group mb-1">
                                            <div class="input-group width-100">
                                                <span class="input-group-addon width-35" style="text-align: left"> In Time</span>
                                                <input type="datetime-local" class="form-control" name="in_time" id="in_time" value="{{ old('in_time') }}">
                                            </div>
                                        </div> --}}

                                        {{-- <div class="form-group mb-1">
                                            <div class="input-group width-100">
                                                <span class="input-group-addon width-35" style="text-align: left">Driver</span>
                                                <select name="driver_id" id="driver_id" class="form-control select2" style="width: 100%" required>
                                                    <option value="" selected>--- Select A Driver or Delivery Man ---</option>
                                                    @foreach($drivers as $driver)
                                                    <option value="{{ $driver->id }}">{{ $driver->name }}</option>
                                                    @endforeach
                                                </select>
                                            </div>
                                        </div> --}}
                                    </div>
                                </div>

                                <div class="form-group mb-1">
                                    <div class="col-sm-11 text-right" style="margin-left: 24px;">
                                        <div class="btn-group">
                                            <button type="submit" class="btn btn-sm btn-success"> <i class="fa fa-save"></i> Submit </button>
                                            <a href="{{ route('vehicles.index') }}" class="btn btn-sm btn-info"> <i class="fa fa-list"></i> List </a>
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
