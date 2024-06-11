@extends('backend.layout.app')
@section('title', 'E-Commerce Site')
@section('content')

    <div class="main-content">
        <div class="main-content-inner">
            <div class="page-content">

                <div class="page-header">
                    <h4 class="page-title"><i class="fa fa-list"></i> Category List</h4>
                    <div class="btn-group">
                        <a class="btn btn-sm btn-primary hidden-print" href="" target="_blank">
                            <i class="fa fa-file-excel-o"></i>
                            Excel
                        </a>
                        <a class="btn btn-sm btn-primary" href="{{ route('select.create') }}">
                            <i class="fa fa-plus-circle"></i>
                            Add New Category
                        </a>

                    </div>
                </div>
                <div class="row">

                    <div class="col-sm-12">
                        <div class="table-responsive">
                            <table class="table table-bordered table-hover fixed-table-header">
                                <thead>
                                    <tr class="table-header-bg">
                                        <th width="10%" class="text-center">SL</th>
                                        <th width="25%" class="text-center"> Category English</th>
                                        <th width="25%" class="text-center">Category Bangla</th>
                                        <th width="10%" class="text-center">Action</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($selects as $key => $select)
                                        <tr>
                                            <td>{{ $key + 1 }}</td>
                                            <td>{{ $select->category_en }}</td>
                                            <td>{{ $select->category_bn }}</td>
                                            <td class="text-center">
                                                <div class="dropdown">
                                                    <a href="javascript:void(0)" class="text-danger fa fa-eye"
                                                        type="button" data-toggle="dropdown"></a>
                                                    <ul class="dropdown-menu dropdown-menu-right">
                                                        <li>
                                                            <a href="{{ route('select.edit', $select->id) }}"
                                                                title="Edit">
                                                                <i class="fa fa-pencil-square-o"></i> Edit
                                                            </a>
                                                        </li>
                                                        <li>
                                                            <a href="javascript:void(0)" title="Delete"
                                                                onclick="event.preventDefault(); document.getElementById('delete-form-{{ $select->id }}').submit();"
                                                                type="button">
                                                                <i class="fa fa-trash"></i> Delete
                                                            </a>
                                                            <form id="delete-form-{{ $select->id }}"
                                                                action="{{ route('select.destroy', $select->id) }}"
                                                                method="POST" style="display: none;">
                                                                @csrf
                                                                @method('DELETE')
                                                            </form>
                                                        </li>
                                                    </ul>
                                                </div>
                                            </td>
                                        </tr>
                                    @endforeach
                                </tbody>


                            </table>
                            <span class="pull-right" style="margin-right: 1px">
                                <ul class="pagination">
                                    <li class="  disabled ">
                                        <a class href="">← First</a>
                                    </li>
                                    <li class="  disabled ">
                                        <a class href><i class="fa fa-angle-double-left"></i></a>
                                    </li>
                                    <li class="active"><span>1</span></li>

                                    <li class=" ">
                                        <a class href=""><i class="fa fa-angle-double-right"></i></a>
                                    </li>
                                    <li class=" ">
                                        <a class href="">Last →</a>
                                    </li>
                                </ul>
                            </span>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

@endsection
