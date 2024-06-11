@extends('backend.layout.app')
@section('title', 'E-Commerce Site')
@section('content')


    <div class="main-content">
        <div class="main-content-inner">
            <div class="page-content">

                <div class="page-header">
                    <h4 class="page-title"><i class="fa fa-list"></i> Driver List</h4>
                    <div class="btn-group">
                        <a class="btn btn-sm btn-primary hidden-print" href="" target="_blank">
                            <i class="fa fa-file-excel-o"></i>
                            Excel
                        </a>
                        <a class="btn btn-sm btn-primary" href="{{ route('driver.create') }}">
                            <i class="fa fa-plus-circle"></i>
                            Add New Driver
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
                                        <th width="10%" class="text-center">Driver Name</th>
                                        <th width="15%" class="text-center">Address</th>
                                        <th width="13%" class="text-center">Email</th>
                                        <th width="10%" class="text-center">Phone</th>
                                        <th width="10%" class="text-center">Password</th>
                                        <th width="10%" class="text-center">NID No.</th>
                                        <th width="10%" class="text-center">NID Image</th>
                                        <th width="10%" class="text-center">Driving License</th>
                                        <th width="10%" class="text-center">License Image</th>
                                        <th width="7%" class="text-center">Action</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($drivers as $key => $driver)
                                        <tr>
                                            <td>{{ $key + 1 }}</td>
                                            <td>{{ $driver->name }}</td>
                                            <td>{{ $driver->address }}</td>
                                            <td>{{ $driver->email }}</td>
                                            <td>{{ $driver->phone }}</td>
                                            <td>{{ $driver->password }}</td>
                                            <td>{{ $driver->nid }}</td>
                                            <td>
                                                <img src="{{ asset('images/' . $driver->nidimage) }}" height="50">
                                            </td>
                                            <td>{{ $driver->drivinglicense }}</td>
                                            <td>
                                                <img src="{{ asset('images/' . $driver->licenseImage) }}" height="50">
                                            </td>
                                            <td class="text-center">
                                                <div class="dropdown">
                                                    <a href="javascript:void(0)" class="text-danger fa fa-ellipsis-v"
                                                        type="button" data-toggle="dropdown"></a>
                                                    <ul class="dropdown-menu dropdown-menu-right">
                                                        <li>
                                                            <a href="{{ route('driver.edit', $driver->id) }}"
                                                                title="Edit">
                                                                <i class="fa fa-pencil-square-o"></i> Edit
                                                            </a>
                                                        </li>
                                                        <li>
                                                            <a href="javascript:void(0)" title="Delete"
                                                                onclick="event.preventDefault(); document.getElementById('delete-form-{{ $driver->id }}').submit();"
                                                                type="button">
                                                                <i class="fa fa-trash"></i> Delete
                                                            </a>
                                                            <form id="delete-form-{{ $driver->id }}"
                                                                action="{{ route('driver.destroy', $driver->id) }}"
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
