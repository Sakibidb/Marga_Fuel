@extends('backend.layout.app')
@section('title', 'E-Commerce Site')
@section('content')


    <div class="main-content">
        <div class="main-content-inner">
            <div class="page-content">

                <div class="page-header">
                    <h4 class="page-title"><i class="fa fa-list"></i> Vehicles Assign List</h4>
                    <div class="btn-group">
                        <a class="btn btn-sm btn-primary hidden-print" href="" target="_blank">
                            <i class="fa fa-file-excel-o"></i>
                            Excel
                        </a>
                        <a class="btn btn-sm btn-primary" href="{{ route('vassign.create') }}">
                            <i class="fa fa-plus-circle"></i>
                            New Vehicles Assign
                        </a>

                    </div>
                </div>
                <div class="row">

                    <div class="col-sm-12">
                        <div class="table-responsive">
                            <table class="table table-bordered table-hover fixed-table-header">
                                <thead>
                                    <tr class="table-header-bg">
                                        <th width="5%" class="text-center">SL</th>
                                        <th width="15%" class="text-center">Vehicles No.</th>
                                        <th width="25%" class="text-center">Driver Name</th>
                                        <th width="25%" class="text-center">Shift</th>
                                        <th width="25%" class="text-center">Capacity</th>
                                        <th width="5%" class="text-center">Action</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($assigns as $key => $assign)
                                        <tr>
                                            <td>{{ $key + 1 }}</td>
                                            <td>{{ $assign->vehicle->vehicle_number }}</td>
                                            <td>{{ $assign->user->name }}</td>
                                            <td>{{ $assign->shift->name }}</td>
                                            <td>{{ $assign->capacity }}</td>
                                            <td class="text-center">
                                                <div class="dropdown">
                                                    <a href="javascript:void(0)" class="text-danger fa fa-eye"
                                                        type="button" data-toggle="dropdown"></a>
                                                    <ul class="dropdown-menu dropdown-menu-right">
                                                        <li>
                                                            <a href="{{ route('vassign.edit', $assign->id) }}"
                                                                title="Edit">
                                                                <i class="fa fa-pencil-square-o"></i> Edit
                                                            </a>
                                                        </li>
                                                        <li>
                                                            <a href="javascript:void(0)" title="Delete"
                                                                onclick="event.preventDefault(); document.getElementById('delete-form-{{ $assign->id }}').submit();"
                                                                type="button">
                                                                <i class="fa fa-trash"></i> Delete
                                                            </a>
                                                            <form id="delete-form-{{ $assign->id }}"
                                                                action="{{ route('vassign.destroy', $assign->id) }}"
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
