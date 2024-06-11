@extends('backend.layout.app')
@section('title', 'E-Commerce Site')
@section('content')
    <div class="main-content">
        <div class="main-content-inner">
            <div class="page-content">
                <div class="page-header">
                    <h4 class="page-title"><i class="fa fa-list"></i> Delivery Create</h4>
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

                <div class="row">
                    <div class="col-12">
                        <div class="widget-body">
                            <div class="widget-main">
                                <form class="form-horizontal mt-2" action="{{ route('deliveries.store') }}"
                                    method="POST">
                                    @csrf
                                    {{-- @method('put') --}}
                                    <div class="row" style="margin-bottom: 30px">
                                        <div class="col-lg-5" style="margin-left: 80px">


                                            <div class="form-group mb-1">
                                                <div class="input-group width-100">
                                                    <span class="input-group-addon width-35" style="text-align: left">
                                                        Order ID: </span>
                                                    <p> {{ $id ?? '' }}
                                                    </p>
                                                    <input type="hidden" value="{{ $id ?? '' }}" name="order_id"
                                                        id="order_id">
                                                </div>
                                            </div>

                                            <div class="form-group mb-1">
                                                <div class="input-group width-100">
                                                    <span class="input-group-addon width-35" style="text-align: left">
                                                        Customer: </span>
                                                    <p> {{ $customer ?? '' }}
                                                    </p>
                                                    <input type="hidden" value="{{ $customer ?? '' }}" name="customer"
                                                        id="customer">
                                                </div>
                                            </div>

                                            <div class="form-group mb-1">
                                                <div class="input-group width-100">
                                                    <span class="input-group-addon width-35" style="text-align: left">
                                                        Warehouse <span class="label-required">*</span></span>
                                                    <select name="warehouse" id="warehouse" class="form-control" required>
                                                        <option value="">
                                                            {{ $delivery ? $delivery->warehouse : '' }}
                                                        </option>
                                                        @foreach ($warehouses as $warehouse)
                                                            <option value="{{ $warehouse->id }}">{{ $warehouse->name }}
                                                            </option>
                                                        @endforeach
                                                    </select>
                                                </div>
                                            </div>

                                            <div class="form-group mb-1">
                                                <div class="input-group width-100">
                                                    <span class="input-group-addon width-35" style="text-align: left">
                                                        Vehicle </span>
                                                    <select name="vehicle" id="vehicle" class="form-control">

                                                        @foreach ($vehicles as $vehicle)
                                                            <option value="{{ $vehicle->id }} ">
                                                                {{ $vehicle->name }}
                                                            </option>
                                                        @endforeach
                                                    </select>
                                                </div>
                                            </div>


                                            <div class="form-group mb-1">
                                                <div class="input-group width-100">
                                                    <span class="input-group-addon width-35" style="text-align: left">
                                                        Delivery Date <span class="label-required">*</span></span>
                                                    <input type="datetime-local" class="form-control" name="delivery_date"
                                                        id="delivery_date"
                                                        value="{{ $delivery ? date('Y-m-d\TH:i', strtotime($delivery->delivery_date)) : old('delivery_date') }}"
                                                        required>

                                                </div>
                                            </div>

                                            <!-- Add more fields as needed -->

                                        </div>
                                    </div>

                                    <div class="form-group mb-1">
                                        <div class="col-sm-11 text-right" style="margin-left: 24px;">
                                            <div class="btn-group">
                                                <button type="submit" class="btn btn-sm btn-success"> <i
                                                        class="fa fa-save"></i> Submit </button>
                                                <a href="{{ route('deliveries.index') }}" class="btn btn-sm btn-info"> <i
                                                        class="fa fa-list"></i> List </a>
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
