@extends('backend.layout.app')
@section('title', 'Edit User')
@section('content')
<div class="main-content">
    <div class="main-content-inner">
        <div class="breadcrumbs ace-save-state" id="breadcrumbs">
            <ul class="breadcrumb">
                <li>
                    <i class="ace-icon fa fa-home home-icon"></i>
                    <a href="#">Home</a>
                </li>
                <li class="active">Edit User</li>
            </ul>

            <div class="nav-search" id="nav-search">
                <form class="form-search">
                    <span class="input-icon">
                        <input type="text" placeholder="Search ..." class="nav-search-input" id="nav-search-input" autocomplete="off" />
                        <i class="ace-icon fa fa-search nav-search-icon"></i>
                    </span>
                </form>
            </div>
        </div>

        <div class="page-content">
            <div class="row">
                <div class="col-sm-12">
                    @if(session('success'))
                        <div class="alert alert-success">
                            {{ session('success') }}
                        </div>
                    @endif

                    @if($errors->any())
                        <div class="alert alert-danger">
                            <ul>
                                @foreach($errors->all() as $error)
                                    <li>{{ $error }}</li>
                                @endforeach
                            </ul>
                        </div>
                    @endif

                    <div class="widget-box">
                        <div class="widget-header">
                            <h4 class="widget-title"> <i class="fa fa-pencil-square-o"></i> Edit User
                            </h4>
                        </div>

                        <form class="form-horizontal" action="{{ route('userUpdate') }}" method="post">
                            @csrf

                            <div class="widget-body">
                                <div class="row pt-2 pr-2">
                                    <div class="col-sm-12">
                                        <div class="row">
                                            <div class="col-sm-12 px-3">
                                                <!-- Name -->
                                                <div class="col-sm-12 col-md-6">
                                                    <div class="input-group width-100 mb-1">
                                                        <span class="input-group-addon width-30" style="text-align: left">
                                                            Name <span class="label-required">*</span>
                                                        </span>
                                                        <input type="text" class="form-control" name="name" id="name" value="{{ old('name', $user->name) }}">
                                                    </div>
                                                </div>

                                                <input type="hidden" value="{{ $user->id }}" name="id">

                                                <!-- Email -->
                                                <div class="col-sm-12 col-md-6">
                                                    <div class="input-group width-100 mb-1">
                                                        <span class="input-group-addon width-30" style="text-align: left">
                                                            Email <span class="label-required">*</span>
                                                        </span>
                                                        <input type="email" class="form-control" name="email" id="email" value="{{ old('email', $user->email) }}">
                                                    </div>
                                                </div>

                                                <!-- Mobile -->
                                                <div class="col-sm-12 col-md-6">
                                                    <div class="input-group width-100 mb-1">
                                                        <span class="input-group-addon width-30" style="text-align: left">
                                                            Mobile <span class="label-required">*</span>
                                                        </span>
                                                        <input type="text" class="form-control" name="mobile" id="mobile" value="{{ old('mobile', $user->mobile) }}">
                                                    </div>
                                                </div>

                                                <!-- NID -->
                                                <div class="col-sm-12 col-md-6">
                                                    <div class="input-group width-100 mb-1">
                                                        <span class="input-group-addon width-30" style="text-align: left">
                                                            NID/Driving Licence <span class="label-required">*</span>
                                                        </span>
                                                        <input type="text" class="form-control" name="nid" id="nid" value="{{ old('nid', $user->nid) }}">
                                                    </div>
                                                </div>

                                                <!-- Address -->
                                                <div class="col-sm-12 col-md-6">
                                                    <div class="input-group width-100 mb-1">
                                                        <span class="input-group-addon width-30" style="text-align: left">
                                                            Address <span class="label-required">*</span>
                                                        </span>
                                                        <input type="text" class="form-control" name="address" id="address" value="{{ old('address', $user->address) }}">
                                                    </div>
                                                </div>

                                                <!-- Old Password -->
                                                <div class="col-sm-12 col-md-6">
                                                    <div class="input-group width-100 mb-1">
                                                        <span class="input-group-addon width-30" style="text-align: left">
                                                            Old Password
                                                        </span>
                                                        <input type="password" class="form-control" name="old_password" id="old_password">
                                                    </div>
                                                </div>

                                                <!-- New Password -->
                                                <div class="col-sm-12 col-md-6">
                                                    <div class="input-group width-100 mb-1">
                                                        <span class="input-group-addon width-30" style="text-align: left">
                                                            New Password
                                                        </span>
                                                        <input type="password" class="form-control" name="new_password" id="new_password">
                                                    </div>
                                                </div>

                                                <!-- Confirm New Password -->
                                                <div class="col-sm-12 col-md-6">
                                                    <div class="input-group width-100 mb-1">
                                                        <span class="input-group-addon width-30" style="text-align: left">
                                                            Confirm New Password
                                                        </span>
                                                        <input type="password" class="form-control" name="new_password_confirmation" id="confirm_new_password">
                                                    </div>
                                                </div>
                                            </div>

                                            <div class="col-xs-12">
                                                <h5 class="widget-title">
                                                    <div class="row" style="margin-top: 10px; padding: 5px">
                                                        <div class="col-md-12 text-right pr-2">
                                                            <button type="submit" class="btn btn-primary btn-sm btn-block" style="max-width: 150px">
                                                                <i class="fa fa-save"></i> Update
                                                            </button>
                                                        </div>
                                                    </div>
                                                    <div class="space-10"></div>
                                                </h5>
                                            </div>
                                        </div>
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
@endsection
