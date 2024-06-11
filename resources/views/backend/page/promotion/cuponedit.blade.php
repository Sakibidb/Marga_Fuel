@extends('backend.layout.app')
@section('title', 'E-Commerce Site')

@section('content')
    <div class="main-content">
        <div class="main-content-inner">
            <div class="page-content">
                <div class="page-header">
                    <h4 class="page-title"><i class="fa fa-list"></i> Coupon Edit</h4>
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
                                <form class="form-horizontal mt-2" action="{{ route('cupon.update', $cupon->id) }}"
                                    method="POST" enctype="multipart/form-data">
                                    @csrf
                                    @method('PUT')

                                    <div class="row" style="margin-bottom: 30px">
                                        <div class="col-lg-5" style="margin-left: 80px">

                                            <div class="form-group mb-1">
                                                <div class="input-group width-100">
                                                    <span class="input-group-addon width-35" style="text-align: left">
                                                        Use Type<span class="label-required" style="color: red">*</span>
                                                    </span>
                                                    <select class="form-control" id="use" name="use">
                                                        <option value="{{ $cupon->use }}">{{ $cupon->use }}</option>
                                                        <option value="once">Once</option>
                                                        <option value="multiple"> Multiple </option>
                                                    </select>
                                                </div>
                                            </div>

                                            <div class="form-group mb-1">
                                                <div class="input-group width-100">
                                                    <span class="input-group-addon width-35" style="text-align: left">
                                                        Name <span class="label-required" style="color: red">*</span></span>
                                                    <input type="text" class="form-control" name="name" id="name"
                                                        value="{{ $cupon->name }}" required>
                                                </div>
                                            </div>

                                            <div class="form-group mb-1">
                                                <div class="input-group width-100">
                                                    <span class="input-group-addon width-35" style="text-align: left">
                                                        Code <span class="label-required" style="color: red">*</span></span>
                                                    <input type="text" class="form-control" name="code" id="code"
                                                        value="{{ $cupon->code }}" required>
                                                </div>
                                            </div>


                                            <div class="form-group mb-1">
                                                <div class="input-group width-100">
                                                    <span class="input-group-addon width-35" style="text-align: left">
                                                        Start Time <span class="label-required"
                                                            style="color: red">*</span></span>
                                                    <input type="datetime-local" class="form-control" name="sdate"
                                                        id="sdate" value="{{ $cupon->sdate }}" required>
                                                </div>
                                            </div>

                                            <div class="form-group mb-1">
                                                <div class="input-group width-100">
                                                    <span class="input-group-addon width-35" style="text-align: left">
                                                        End Time <span class="label-required"
                                                            style="color: red">*</span></span>
                                                    <input type="datetime-local" class="form-control" name="edate"
                                                        id="edate" value="{{ $cupon->edate }}" required>
                                                </div>
                                            </div>

                                            <div class="form-group mb-1">
                                                <div class="input-group width-100">
                                                    <span class="input-group-addon width-35" style="text-align: left">
                                                        Discount Type<span class="label-required"
                                                            style="color: red">*</span>
                                                    </span>
                                                    <select class="form-control" id="dis_type" name="dis_type">
                                                        <option value="{{ $cupon->dis_type }}">{{ $cupon->dis_type }}
                                                        </option>
                                                        <option value="percent">Percent</option>
                                                        <option value="flat"> Flat </option>
                                                    </select>
                                                </div>
                                            </div>

                                            <div class="form-group mb-1">
                                                <div class="input-group width-100">
                                                    <span class="input-group-addon width-35" style="text-align: left">
                                                        Amount <span class="label-required"
                                                            style="color: red">*</span></span>
                                                    <input type="text" class="form-control" name="amount" id="amount"
                                                        value="{{ $cupon->amount }}" required>
                                                </div>
                                            </div>

                                            <div class="form-group mb-1">
                                                <div class="input-group width-100">
                                                    <span class="input-group-addon width-35" style="text-align: left">
                                                        Description </span>
                                                    <input type="text" class="form-control" name="description"
                                                        id="description" value="{{ $cupon->description }}">
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
