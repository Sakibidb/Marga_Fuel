@extends('backend.layout.app')
@section('title', 'E-Commerce Site')

@section('content')
    <div class="main-content">
        <div class="main-content-inner">
            <div class="page-content">
                <div class="page-header">
                    <h4 class="page-title"><i class="fa fa-list"></i> Company Information</h4>
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
                <div class="mt-2 ">
                    <div class="row">
                        <div class="col-12">
                            <form class="form-horizontal mt-2" action="{{ route('company.storeOrUpdate') }}" method="POST"
                                enctype="multipart/form-data">
                                @csrf
                                <div class="row" style="margin-bottom: 30px">
                                    <div class="col-lg-5" style="margin-left: 80px">
                                        <div class="form-group mb-1">
                                            <div class="input-group width-100">
                                                <span class="input-group-addon width-35" style="text-align: left">
                                                    Company Name <span class="label-required"
                                                        style="color: red">*</span></span>
                                                <input type="text" class="form-control" name="name" id="name"
                                                    value="{{ $company ? $company->name : '' }}" required>
                                            </div>
                                        </div>
                                        <div class="form-group mb-1">
                                            <div class="input-group width-100">
                                                <span class="input-group-addon width-35" style="text-align: left">
                                                    Company Name Bangla<span class="label-required"
                                                        style="color: red">*</span></span>
                                                <input type="text" class="form-control" name="bangla_company_name" id="bangla_company_name"
                                                    value="{{ $company ? $company->bangla_company_name : '' }}" required>
                                            </div>
                                        </div>
                                        <div class="form-group mb-1">
                                            <div class="input-group width-100">
                                                <span class="input-group-addon width-35" style="text-align: left">
                                                    Company Title <span class="label-required"
                                                        style="color: red">*</span></span>
                                                <input type="text" class="form-control" name="title" id="title"
                                                    value="{{ $company ? $company->title : '' }}" required>
                                            </div>
                                        </div>

                                        <div class="form-group mb-1">
                                            <div class="input-group width-100">
                                                <span class="input-group-addon width-35" style="text-align: left">
                                                    Phone <span class="label-required" style="color: red">*</span></span>
                                                <input type="text" class="form-control" name="mobile" id="mobile"
                                                    value="{{ $company ? $company->mobile : '' }}" required>
                                            </div>
                                        </div>
                                        <div class="form-group mb-1">
                                            <div class="input-group width-100">
                                                <span class="input-group-addon width-35" style="text-align: left">
                                                    Hotline <span class="label-required" style="color: red">*</span></span>
                                                <input type="text" class="form-control" name="hotline" id="hotline"
                                                    value="{{ $company ? $company->hotline : '' }}" required>
                                            </div>
                                        </div>
                                        <div class="form-group mb-1">
                                            <div class="input-group width-100">
                                                <span class="input-group-addon width-35" style="text-align: left">
                                                    Email</span>
                                                <input type="text" class="form-control" name="email" id="email"
                                                    value="{{ $company ? $company->email : '' }}">
                                            </div>
                                        </div>
                                        <div class="form-group mb-1">
                                            <div class="input-group width-100">
                                                <span class="input-group-addon width-35" style="text-align: left">
                                                    Website Banner 1
                                                </span>
                                                <input type="file" class="form-control" id="banner1" name="banner1"
                                                    accept="image/*">
                                            </div>
                                            @if (!empty($company->image))
                                                <img src="{{ asset('images/' . $company->banner1) }}" height="50">
                                            @endif
                                        </div>
                                        <div class="form-group mb-1">
                                            <div class="input-group width-100">
                                                <span class="input-group-addon width-35" style="text-align: left">
                                                    Website Banner 2
                                                </span>
                                                <input type="file" class="form-control" id="banner2" name="banner2"
                                                    accept="image/*">
                                            </div>
                                            @if (!empty($company->image))
                                                <img src="{{ asset('images/' . $company->banner2) }}" height="50">
                                            @endif
                                        </div>
                                        <div class="form-group mb-1">
                                            <div class="input-group width-100">
                                                <span class="input-group-addon width-35" style="text-align: left">
                                                    Website Banner 3
                                                </span>
                                                <input type="file" class="form-control" id="banner3" name="banner3"
                                                    accept="image/*">
                                            </div>
                                            @if (!empty($company->image))
                                                <img src="{{ asset('images/' . $company->banner3) }}" height="50">
                                            @endif
                                        </div>
                                    </div>
                                    <div class="col-lg-5" style="margin-left: 30px; margin-right: 60px">
                                        <div class="form-group mb-1">
                                            <div class="input-group width-100">
                                                <span class="input-group-addon width-35" style="text-align: left">
                                                    Website Link</span>
                                                <input type="text" class="form-control" name="websitelink"
                                                    placeholder="Website Link" id="websitelink"
                                                    value="{{ $company ? $company->websitelink : '' }}">
                                            </div>
                                        </div>

                                        <div class="form-group mb-1">
                                            <div class="input-group width-100">
                                                <span class="input-group-addon width-35" style="text-align: left">
                                                    Facebook Link</span>
                                                <input type="text" class="form-control" name="facebooklink"
                                                    placeholder="Facebook Link" id="facebooklink"
                                                    value="{{ $company ? $company->facebooklink : '' }}">
                                            </div>
                                        </div>
                                        <div class="form-group mb-1">
                                            <div class="input-group width-100">
                                                <span class="input-group-addon width-35" style="text-align: left">
                                                    Youtube Link</span>
                                                <input type="text" class="form-control" name="youtubeink"
                                                    placeholder="Youtube Link" id="youtubeink"
                                                    value="{{ $company ? $company->youtubeink : '' }}">
                                            </div>
                                        </div>

                                        <div class="form-group mb-1">
                                            <div class="input-group width-100">
                                                <span class="input-group-addon width-35" style="text-align: left">
                                                    Google Tag</span>
                                                <input type="text" class="form-control" name="googletag"
                                                    id="googletag" value="{{ $company ? $company->googletag : '' }}">
                                            </div>
                                        </div>

                                        <div class="form-group mb-1">
                                            <div class="input-group width-100">
                                                <span class="input-group-addon width-35" style="text-align: left">
                                                    Address </span>
                                                <textarea name="address" id="address" class="form-control" rows="3">{{ $company ? $company->address : '' }}</textarea>
                                            </div>
                                        </div>
                                        <div class="form-group mb-1">
                                            <div class="input-group width-100">
                                                <span class="input-group-addon width-35" style="text-align: left">
                                                    Company logo
                                                </span>
                                                <input type="file" class="form-control" id="image" name="image"
                                                    accept="image/*">
                                            </div>
                                            @if (!empty($company->image))
                                                <img src="{{ asset('images/' . $company->image) }}" height="50">
                                            @endif
                                        </div>

                                        <div class="form-group mb-1">
                                            <div class="input-group width-100">
                                                <span class="input-group-addon width-35 " style="text-align: left">
                                                    Contact Background Image
                                                </span>
                                                <input type="file" class="form-control" id="cantactbackground"
                                                    name="cantactbackground" accept="image/*">
                                            </div>
                                            @if (!empty($company->image))
                                                <img src="{{ asset('images/' . $company->cantactbackground) }}"
                                                    height="50">
                                            @endif
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
@endsection
