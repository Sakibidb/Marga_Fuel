@extends('backend.layout.app')
@section('title', 'E-Commerce Site')

@section('content')
    <div class="main-content">
        <div class="main-content-inner">
            <div class="page-content">
                <div class="page-header">
                    <h4 class="page-title"><i class="fa fa-list"></i> Add New Product</h4>
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
                                <form class="form-horizontal mt-2" action="{{ route('products.store') }}" method="POST"
                                    enctype="multipart/form-data">
                                    @csrf
                                    <div class="row" style="margin-bottom: 30px">
                                        <div class="col-lg-5" style="margin-left: 80px">
                                            {{-- <div class="form-group mb-1">
                                                <div class="input-group width-100">
                                                    <span class="input-group-addon width-35" style="text-align: left">
                                                        category <span class="label-required"
                                                            style="color: red">*</span></span>
                                                    <select class="form-control" id="category" name="category">
                                                        <option value="">Select a category</option>
                                                        <!-- Assuming $categories is an array of category objects -->
                                                        @foreach ($categories as $category)
                                                            <option value="{{ $category->id }}">{{ $category->name }}
                                                            </option>
                                                        @endforeach
                                                    </select>
                                                </div>
                                            </div> --}}
                                            <div class="form-group mb-1">
                                                <div class="input-group width-100">
                                                    <span class="input-group-addon width-35" style="text-align: left">
                                                        Product Name English <span class="label-required"
                                                            style="color: red">*</span></span>
                                                    <input type="text" class="form-control" id="name" name="name"
                                                        value="{{ old('name') }}" required>
                                                </div>
                                            </div>

                                            <div class="form-group mb-1">
                                                <div class="input-group width-100">
                                                    <span class="input-group-addon width-35" style="text-align: left">
                                                        Product Name Bangla <span class="label-required"
                                                            style="color: red">*</span></span>
                                                    <input type="text" class="form-control" id="bn_name" name="bn_name"
                                                        value="{{ old('bn_name') }}" required>
                                                </div>
                                            </div>
                                            <div class="form-group mb-1">
                                                <div class="input-group width-100">
                                                    <span class="input-group-addon width-35" style="text-align: left">
                                                        Price English</span>
                                                    <input type="text" class="form-control" id="price" name="price"
                                                        value="{{ old('price') }}">
                                                </div>
                                            </div>

                                            <div class="form-group mb-1">
                                                <div class="input-group width-100">
                                                    <span class="input-group-addon width-35" style="text-align: left">
                                                        Price Bangla</span>
                                                    <input type="text" class="form-control" id="bn_price" name="bn_price"
                                                        value="{{ old('bn_price') }}">
                                                </div>
                                            </div>
                                            {{-- <div class="form-group mb-1">
                                                <div class="input-group width-100">
                                                    <span class="input-group-addon width-35" style="text-align: left">
                                                        Product Code</span>
                                                    <input type="text" class="form-control" id="product_code" name="product_code"
                                                        value="{{ old('product_code') }}">
                                                </div>
                                            </div> --}}

                                        </div>
                                        <div class="col-lg-5" style="margin-left: 30px; margin-right: 60px">
                                            {{-- <div class="form-group mb-1">
                                                <div class="input-group width-100">
                                                    <span class="input-group-addon width-35" style="text-align: left">
                                                        SKU</span>
                                                    <input type="text" class="form-control" id="sku" name="sku"
                                                        value="{{ old('sku') }}">
                                                </div>
                                            </div> --}}
                                            <div class="form-group mb-1">
                                                <div class="input-group width-100">
                                                    <span class="input-group-addon width-35" style="text-align: left">
                                                        Image
                                                    </span>
                                                    <input type="file" class="form-control" id="image" name="image"
                                                        accept="image/*">
                                                </div>
                                            </div>
                                            <div class="form-group mb-1">
                                                <div class="input-group width-100">
                                                    <span class="input-group-addon width-35" style="text-align: left">
                                                        Stock (It will be litters)</span>
                                                    <input type="text" class="form-control" id="stock" name="stock"
                                                        value="{{ old('stock') }}">
                                                </div>
                                            </div>
                                            {{-- <div class="form-group mb-1">
                                                <div class="input-group width-100">
                                                    <span class="input-group-addon width-35" style="text-align: left">
                                                        Brand</span>
                                                    <input type="text" class="form-control" id="brand" name="brand"
                                                        value="{{ old('brand') }}">
                                                </div>
                                            </div> --}}
                                        </div>
                                    </div>
                                    <div class="form-group mb-1">
                                        <div class="col-sm-11 text-right" style="margin-left: 24px;">
                                            <div class="btn-group">
                                                <button class="btn btn-sm btn-success"> <i class="fa fa-save"></i>
                                                    Submit </button>
                                                    <a href="{{ route('products.index') }}" class="btn btn-sm btn-info"> <i class="fa fa-list"></i> List </a>
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
