@extends('backend.layout.app')
@section('title', 'E-Commerce Site')
@section('content')




<div class="main-content">
    <div class="main-content-inner">
        <div class="page-content">

            <div class="page-header">
                <h4 class="page-title"><i class="fa fa-list"></i> Customer List</h4>
                <div class="btn-group">
                    <a class="btn btn-sm btn-primary" href="javascript:void(0)" onclick="excel()">
                        <i class="fa fa-file-excel-o"></i>
                        Excel
                    </a>
                    <a class="btn btn-sm btn-primary" href="{{ route ('customer.create') }}">
                        <i class="fa fa-plus-circle"></i>
                        Add New
                    </a>
                </div>
            </div>

            <div class="row">
                <form id="filterForm" action="" method="GET">
                    <input name="type" type="hidden" id="typeId">

                </form>
                <div class="col-xs-12">
                    <div class="table-responsive">
                        <table class="table table-bordered table-hover fixed-table-header min-height-table">
                            <thead>
                                <tr class="table-header-bg">
                                    <th width="5%" class="text-center">SL</th>
                                    <th width="10%">Name</th>
                                    <th width="10%">Phone</th>
                                    <th width="10%" class="text-center">Email</th>

                                    {{-- <th width="5%">Gender</th> --}}
                                    <th width="10%">Country</th>
                                    <th width="10%" class="text-center">Address</th>
                                    <th width="15%" class="text-center">Shipping Address</th>
                                    <th width="5%" class="text-center">Status</th>
                                    <th width="5%" class="text-center">Action</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach($customers as $customer)
                                <tr>
                                    <td>SL</td>
                                    <td>{{ $customer->name }}</td>
                                    <td>{{ $customer->phone }}</td>
                                    <td>{{ $customer->email }}</td>
                                    {{-- <td>{{ $customer->gender }}</td> --}}
                                    {{-- <td>{{ $customer->country }}</td> --}}
                                    <td>{{ optional($customer->countryss)->short_name ?? '' }}</td>
                                    <td>{{ $customer->address }}</td>
                                    <td>{{ $customer->shipping_address }}</td>
                                    <td>{{ $customer->status }}
                                        <div>
                                            <a class="updateStatus" id="id-{{ $customer->id }}" item-id="{{ $customer->id }}" item-url="" href="javascript:void(0)">
                                                <i class="fa fa-toggle-on text-success" style="font-size: 20px" status="{{ $customer->status }}"></i>
                                            </a>
                                        </div>
                                    </td>

                                    <td class="text-center">
                                        <div class="dropdown">
                                            <a href="javascript:void(0)" class="text-danger fa fa-ellipsis-v" type="button" data-toggle="dropdown"></a>
                                            <ul class="dropdown-menu dropdown-menu-right">

                                                <li>
                                                    <a href="{{ route('customer.edit', $customer->id) }}" title="Edit">
                                                        <i class="fa fa-pencil-square-o"></i> Edit
                                                    </a>
                                                </li>
                                                
                                                    <li>
                                                        <a href="javascript:void(0)" title="Delete" onclick="delete_item('{{ $customer->id }}')" type="button">
                                                            <i class="fa fa-trash"></i> Delete
                                                        </a>
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


            <div class="md-overlay"></div>

        </div>
    </div>
</div>

<script>
    function delete_item(customerId) {
    if (confirm('Are you sure you want to delete this customer?')) {
        $.ajax({
            url: '/customer/' + customerId,
            type: 'DELETE',
            data: {
                // Optionally, you can send additional data here
                _token: '{{ csrf_token() }}', // Include CSRF token
            },
            success: function(response) {
                // Handle success response
                console.log('Customer deleted successfully');
                // Optionally, you can reload the page or update the UI
            },
            error: function(xhr, status, error) {
                // Handle error response
                console.error('Error deleting customer:', error);
            }
        });
    }
}
</script>


@endsection
