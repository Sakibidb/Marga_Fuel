@extends('backend.layout.app')
@section('title', 'E-Commerce Site')

@section('content')
    <div class="main-content">
        <div class="main-content-inner">
            <div class="page-content">
                <div class="page-header">
                    <h4 class="page-title"><i class="fa fa-list"></i> Vehicles Assign</h4>
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
                                <form class="form-horizontal mt-2" action="{{ route('vassign.store') }}" method="POST"
                                    enctype="multipart/form-data">
                                    @csrf
                                    <div class="row" style="margin-bottom: 30px">
                                        <div class="col-lg-5" style="margin-left: 80px">
                                            <div class="form-group mb-1">
                                                <div class="input-group width-100">
                                                    <span class="input-group-addon width-35" style="text-align: left">
                                                        Vehicles No.<span class="label-required" style="color: red">*</span>
                                                    </span>
                                                    <select class="form-control" id="vehicleno" name="vehicleno">
                                                        <option value="">Select a vehicles</option>
                                                        <!-- Assuming $drivers is an array of driver objects -->
                                                        @foreach ($vehicles as $vehicle)
                                                            <option value="{{ $vehicle->id }}">
                                                                {{ $vehicle->vehicle_number }}
                                                            </option>
                                                        @endforeach
                                                    </select>
                                                </div>
                                            </div>
                                            {{-- <div class="form-group mb-1">
                                                <div class="input-group width-100">
                                                    <span class="input-group-addon width-35" style="text-align: left">
                                                        Driver Name <span class="label-required" style="color: red">*</span>
                                                    </span>
                                                    <select class="form-control" id="drivername" name="drivername">
                                                        <option value="">Select a driver</option>
                                                        <!-- Assuming $drivers is an array of driver objects -->
                                                        @foreach ($drivers as $driver)
                                                            <option value="{{ $driver->id }}">
                                                                {{ $driver->name }} - {{ $driver->phone }}
                                                            </option>
                                                        @endforeach
                                                    </select>
                                                </div>
                                            </div> --}}
                                            <div class="form-group mb-1">
                                                <div class="input-group width-100">
                                                    <span class="input-group-addon width-35" style="text-align: left">
                                                        Driver Name <span class="label-required" style="color: red">*</span>
                                                    </span>
                                                    <select class="form-control" id="drivername" name="drivername">
                                                        <option value="">Select a driver</option>
                                                        @foreach ($drivers as $driver)
                                                            <option value="{{ $driver->id }}">
                                                                {{ $driver->name }} - {{ $driver->mobile }}
                                                            </option>
                                                        @endforeach
                                                    </select>
                                                </div>
                                            </div>
                                            
                                            <div class="form-group mb-1">
                                                <div class="input-group width-100">
                                                    <span class="input-group-addon width-35" style="text-align: left">
                                                        Shift <span class="label-required" style="color: red">*</span>
                                                    </span>
                                                    <select class="form-control" id="shift" name="shift">
                                                        <option value="">Select a shift</option>
                                                        <!-- Assuming $drivers is an array of driver objects -->
                                                        @foreach ($shifts as $shift)
                                                            <option value="{{ $shift->id }}">
                                                                {{ $shift->name }}
                                                            </option>
                                                        @endforeach
                                                    </select>
                                                </div>
                                            </div>

                                            <div class="form-group mb-1">
                                                <div class="input-group width-100">
                                                    <span class="input-group-addon width-35" style="text-align: left">
                                                        Capacity</span>
                                                    <input type="number" class="form-control" name="capacity"
                                                        id="capacity" value="">
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
