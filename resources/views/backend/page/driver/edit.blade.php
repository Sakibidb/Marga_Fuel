@extends('backend.layout.app')
@section('title', 'E-Commerce Site')

@section('content')
    <div class="main-content">
        <div class="main-content-inner">
            <div class="page-content">
                <div class="page-header">
                    <h4 class="page-title"><i class="fa fa-list"></i> Edit Driver</h4>
                </div>
                <div class="mt-2">
                    <div class="mt-2 ">
                        <div class="row">
                            <div class="col-12">
                                <form class="form-horizontal mt-2" action="{{ route('driver.update', $driver->id) }}"
                                    method="POST" enctype="multipart/form-data">
                                    @csrf
                                    @method('PUT')

                                    <div class="row" style="margin-bottom: 30px">
                                        <div class="col-lg-5" style="margin-left: 80px">
                                            <div class="form-group mb-1">
                                                <div class="input-group width-100">
                                                    <span class="input-group-addon width-35" style="text-align: left">
                                                        Name <span class="label-required" style="color: red">*</span></span>
                                                    <input type="text" class="form-control" name="name" id="name"
                                                        value="{{ $driver->name }}" required>
                                                </div>
                                            </div>
                                            <div class="form-group mb-1">
                                                <div class="input-group width-100">
                                                    <span class="input-group-addon width-35" style="text-align: left">
                                                        Password <span class="label-required"
                                                            style="color: red">*</span></span>
                                                    <input type="text" class="form-control" name="password"
                                                        id="password" value="{{ $driver->password }}" required>
                                                </div>
                                            </div>

                                            <div class="form-group mb-1">
                                                <div class="input-group width-100">
                                                    <span class="input-group-addon width-35" style="text-align: left">
                                                        Phone <span class="label-required"
                                                            style="color: red">*</span></span>
                                                    <input type="text" class="form-control" name="phone" id="phone"
                                                        value="{{ $driver->phone }}" required>
                                                </div>
                                            </div>
                                            <div class="form-group mb-1">
                                                <div class="input-group width-100">
                                                    <span class="input-group-addon width-35" style="text-align: left">
                                                        Email</span>
                                                    <input type="text" class="form-control" name="email" id="email"
                                                        value="{{ $driver->email }}">
                                                </div>
                                            </div>
                                            <div class="form-group mb-1">
                                                <div class="input-group width-100">
                                                    <span class="input-group-addon width-35" style="text-align: left">
                                                        NID No</span>
                                                    <input type="text" class="form-control" name="nid" id="nid"
                                                        value="{{ $driver->nid }}">
                                                </div>
                                            </div>

                                        </div>
                                        <div class="col-lg-5" style="margin-left: 30px; margin-right: 60px">
                                            <div class="form-group mb-1">
                                                <div class="input-group width-100">
                                                    <span class="input-group-addon width-35" style="text-align: left">
                                                        Driving License</span>
                                                    <input type="text" class="form-control" name="drivinglicense"
                                                        placeholder="Website Link" id="drivinglicense"
                                                        value="{{ $driver->drivinglicense }}">
                                                </div>
                                            </div>
                                            <div class="form-group mb-1">
                                                <div class="input-group width-100">
                                                    <span class="input-group-addon width-35" style="text-align: left">
                                                        License Image
                                                    </span>
                                                    <input value="" type="file" class="form-control"
                                                        id="licenseImage" name="licenseImage"
                                                        accept="image/*">{{ $driver->licenseImage }}
                                                </div>
                                            </div>
                                            <div class="form-group mb-1">
                                                <div class="input-group width-100">
                                                    <span class="input-group-addon width-35" style="text-align: left">
                                                        Address </span>
                                                    <textarea name="address" id="address" class="form-control" rows="3">{{ $driver->address }}</textarea>
                                                </div>
                                            </div>
                                            <div class="form-group mb-1">
                                                <div class="input-group width-100">
                                                    <span class="input-group-addon width-35" style="text-align: left">
                                                        NID Image
                                                    </span>
                                                    <input value="" type="file" class="form-control"
                                                        id="nidimage" name="nidimage"
                                                        accept="image/*">{{ $driver->nidimage }}
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
