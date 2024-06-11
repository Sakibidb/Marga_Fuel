@extends('backend.layout.app')
@section('title', 'E-Commerce Site')
@section('content')
    <div class="main-content">
        <div class="main-content-inner">


            {{-- <div class="breadcrumbs ace-save-state" id="breadcrumbs">
            <ul class="breadcrumb">
                <li>
                    <i class="ace-icon fa fa-home home-icon"></i>
                    <a href="#">Home</a>
                </li>
                <li class="active">Product</li>
            </ul><!-- /.breadcrumb -->

            <div class="nav-search" id="nav-search">
                <form class="form-search">
                    <span class="input-icon">
                        <input type="text" placeholder="Search ..." class="nav-search-input" id="nav-search-input" autocomplete="off" />
                        <i class="ace-icon fa fa-search nav-search-icon"></i>
                    </span>
                </form>
            </div><!-- /.nav-search -->
        </div> --}}




            <div class="page-content">
                <div class="row">
                    <div class="col-xs-12">
                        <div class="page-header">
                            <div class="page-header">
                                <h4 class="page-title"><i class="fa fa-list"></i> Products List</h4>
                                <div class="btn-group">
                                    <a class="btn btn-sm btn-primary hidden-print" href="" target="_blank">
                                        <i class="fa fa-file-excel-o"></i>
                                        Excel
                                    </a>
                                    <a class="btn btn-sm btn-primary" href="{{ route('products.create') }}">
                                        <i class="fa fa-plus-circle"></i>
                                        Add New Product
                                    </a>

                                </div>
                            </div>
                        </div>
                        <div>
                            <table id="dynamic-table" class="table table-striped table-bordered table-hover">
                                <thead>
                                    <tr style="color: rgb(0, 0, 0)">
                                        <th width="5%" class="text-center">SL</th>
                                        <th width="30%" class="text-center">Image</th>
                                        <th width="25%" class="text-center">Name English</th>
                                        <th width="25%" class="text-center">Name Bangla</th>

                                        {{-- <th>Product Code</th> --}}
                                        {{-- <th>SKU</th>
                                        <th>Category</th> --}}
                                        {{-- <th>Brand</th> --}}
                                        <th width="15%" class="text-center">Price English</th>
                                        <th width="15%" class="text-center">Price Bangla</th>

                                        <th width="20%" class="text-center">Stock</th>
                                        <th width="5%" class="text-center">Action</th>
                                    </tr>
                                </thead>

                                <tbody>
                                    @foreach ($products as $product)
                                        <tr>
                                            <td class="text-center">{{ $product->id }}</td>
                                            <td class="text-center">
                                                <img src="{{ asset('images/' . $product->image) }}" height="50">

                                                {{-- @if ($product->image)
                                        <img src="{{ asset('storage/images/' . $product->image) }}" alt="Product Image" width="100">
                                        @endif --}}
                                            </td>
                                            <td class="text-center">{{ $product->name }}</td>
                                            <td class="text-center">{{ $product->bn_name }}</td>

                                            {{-- <td>{{ $product->product_code }}</td> --}}
                                            {{-- <td>SKU</td> --}}
                                            {{-- <td>{{ $product->categorydi->name }}</td>
                                            <td>brand</td> --}}
                                            <td class="text-center">{{ $product->price }}</td>
                                            <td class="text-center">{{ $product->bn_price }}</td>

                                            <td class="text-center">{{ $product->stock }}</td>

                                            {{-- <div>
                                        @if ($status == 1)
                                            <a class="updateStatus" id="id-{{ $id }}" item-id="{{ $id }}"
                                                item-url="{{ route("update-status", $table) }}" href="javascript:void(0)">
                                                <i class="fa fa-toggle-on text-success" style="font-size: 20px" status="Active"></i>
                                            </a>
                                        @else
                                            <a class="updateStatus" id="id-{{ $id }}" item-id="{{ $id }}"
                                                item-url="{{ route("update-status", $table) }}" href="javascript:void(0)">
                                                <i class="fa fa-toggle-off text-danger" style="font-size: 20px" status="Inactive"></i>
                                            </a>
                                        @endif
                                    </div> --}}


                                            <td class="text-center">
                                                <div class="dropdown">
                                                    <a href="javascript:void(0)" class="text-danger fa fa-ellipsis-v"
                                                        type="button" data-toggle="dropdown"></a>
                                                    <ul class="dropdown-menu dropdown-menu-right">
                                                        <li>
                                                            <a href="{{ route('products.edit', $product->id) }}"
                                                                title="Edit">
                                                                <i class="fa fa-pencil-square-o"></i> Edit
                                                            </a>
                                                        </li>
                                                        <li>
                                                            <a href="{{ route('item_ledger.search', ['p_name'=>$product->name, 'product_id' => $product->id]) }}" title="View Ledger">
                                                                <i class="fa fa-file-pdf-o"></i> Ledger
                                                            </a>
                                                        </li>

                                                        <li>
                                                            <a href="javascript:void(0)" title="Delete"
                                                                onclick="event.preventDefault(); document.getElementById('delete-form-{{ $product->id }}').submit();"
                                                                type="button">
                                                                <i class="fa fa-trash"></i> Delete
                                                            </a>
                                                            <form id="delete-form-{{ $product->id }}"
                                                                action="{{ route('products.destroy', $product->id) }}"
                                                                method="POST" style="display: none;">
                                                                @csrf
                                                                @method('DELETE')
                                                            </form>
                                                        </li>
                                                    </ul>
                                                </div>
                                            </td>

                                            {{-- <td>
                                                <div class="hidden-sm hidden-xs action-buttons">

                                                    <a class="green" href="{{ route('products.edit', $product->id) }}">
                                                        <i class="ace-icon fa fa-pencil bigger-130"></i>
                                                    </a>

                                                    <form method="POST"
                                                        action="{{ route('products.destroy', $product->id) }}">
                                                        @csrf
                                                        @method('DELETE')
                                                        <button type="submit" class="red"
                                                            onclick="return confirm('Are you sure?')">
                                                            <i class="ace-icon fa fa-trash-o bigger-130"></i>
                                                        </button>
                                                    </form>


                                                </div>
                                            </td> --}}
                                        </tr>
                                    @endforeach

                                </tbody>
                            </table>
                        </div>



                        <div class="hr hr32 hr-dotted"></div>



                        <!-- PAGE CONTENT ENDS -->
                    </div><!-- /.col -->
                </div><!-- /.row -->
            </div><!-- /.page-content -->
        </div>
    </div><!-- /.main-content -->


@endsection
