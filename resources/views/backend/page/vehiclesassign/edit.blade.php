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
                                <form class="form-horizontal mt-2" action="{{ route('vassign.update', $assign->id) }}"
                                    method="POST" enctype="multipart/form-data">
                                    @csrf
                                    @method('PUT')
                                    <div class="row" style="margin-bottom: 30px">
                                        <div class="col-lg-5" style="margin-left: 80px">
                                            <div class="form-group mb-1">
                                                <div class="input-group width-100">
                                                    <span class="input-group-addon width-35" style="text-align: left">
                                                        Vehicles No.<span class="label-required" style="color: red">*</span>
                                                    </span>
                                                    {{-- <select class="form-control" id="vehicleno" name="vehicleno">
                                                        <!-- Assuming $assign->vehicleno contains the initially selected value -->
                                                        <option value="{{ $assign->vehicleno }}" disabled selected
                                                            style="color: gray;">
                                                            {{ $assign->vehicleno }}
                                                        </option>
                                                        <!-- Assuming $vehicles is an array of available vehicles -->
                                                        @foreach ($vehicles as $vehicle)
                                                            @if ($vehicle->vehicle_number !== $assign->vehicleno)
                                                                <option value="{{ $vehicle->vehicle_number }}">
                                                                    {{ $vehicle->vehicle_number }}
                                                                </option>
                                                            @endif
                                                        @endforeach
                                                    </select> --}}

                                                    <select class="form-control" id="vehicleno" name="vehicleno">
                                                        <option value="{{ $assign->vehicleno }}" style="coloe:green">
                                                            {{ $assign->vehicleno }}
                                                        </option>
                                                        <!-- Assuming $drivers is an array of driver objects -->
                                                        @foreach ($vehicles as $vehicle)
                                                            @if ($vehicle->vehicle_number !== $assign->vehicleno)
                                                                <option value="{{ $vehicle->vehicle_number }}">
                                                                    {{ $vehicle->vehicle_number }}
                                                                </option>
                                                            @endif
                                                        @endforeach
                                                    </select>

                                                </div>
                                            </div>
                                            <div class="form-group mb-1">
                                                <div class="input-group width-100">
                                                    <span class="input-group-addon width-35" style="text-align: left">
                                                        Driver Name <span class="label-required" style="color: red">*</span>
                                                    </span>

                                                    <select class="form-control" id="drivername" name="drivername">
                                                        <option value="{{ $assign->drivername }}" style="color: green;">
                                                            {{ $assign->drivername }}
                                                        </option>
                                                        <!-- Assuming $drivers is an array of driver objects -->
                                                        @foreach ($drivers as $driver)
                                                            @if ($driver->name !== $assign->drivername)
                                                                <option value="{{ $driver->name }}">
                                                                    {{ $driver->name }} - {{ $driver->phone }}
                                                                </option>
                                                            @endif
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
                                                        <option value="{{ $assign->shift }}" style="color: green;">
                                                            {{ $assign->shift }}</option>
                                                        @foreach ($shifts as $shift)
                                                            @if ($shift->name !== $assign->shift)
                                                                <option value="{{ $shift->name }}">
                                                                    {{ $shift->name }}
                                                                </option>
                                                            @endif
                                                        @endforeach
                                                    </select>
                                                </div>
                                            </div>

                                            <div class="form-group mb-1">
                                                <div class="input-group width-100">
                                                    <span class="input-group-addon width-35" style="text-align: left">
                                                        Capacity</span>
                                                    <input type="number" class="form-control" name="capacity"
                                                        id="capacity" value="{{ $assign->capacity }}">
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
