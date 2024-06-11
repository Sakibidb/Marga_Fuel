@extends('backend.layout.app')
@section('title', 'E-Commerce Site')
@section('content')


<div class="main-content">
    <div class="main-content-inner">
        <div class="page-content">
            <div class="breadcrumbs ace-save-state" id="breadcrumbs">
                <h4 class="pl-2">Add Warehouse</h4>
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
                            <form class="form-horizontal mt-2" action="{{ route('warehouses.store') }}" method="POST">
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
                                                <span class="input-group-addon width-35" style="text-align: left"> Address <span class="label-required">*</span></span>
                                                <input type="text" class="form-control" name="location" id="location" value="{{ old('location') }}" required>
                                            </div>
                                        </div>
                            
                                        <div class="form-group mb-1">
                                            <div class="input-group width-100">
                                                <span class="input-group-addon width-35" style="text-align: left"> Capacity <span class="label-required">*</span></span>
                                                <input type="number" class="form-control" name="capacity" id="capacity" value="{{ old('capacity') }}" required>
                                            </div>
                                        </div>
                            
                                    </div>
                                </div>
                            
                                <div class="form-group mb-1">
                                    <div class="col-sm-11 text-right" style="margin-left: 24px;">
                                        <div class="btn-group">
                                            <button type="submit" class="btn btn-sm btn-success"> <i class="fa fa-save"></i> Submit </button>
                                            <a href="{{ route('warehouses.index') }}" class="btn btn-sm btn-info"> <i class="fa fa-list"></i> List </a>
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
