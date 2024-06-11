@extends('frontend.home.master')
@section('content')
    <div class="card my-4 mx-5">
        <div class="row">
            <div class="col-12 col-lg-3 m-3">
                <div class="card" style="padding: 10px">
                    <div class="card-body">
                        <div class="fm-menu">
                            <div class="list-group list-group-flush">
                                <h5 class="my-3">{!! __('language.hello') !!}, {{ Auth::user()->name ?? '' }}</h5>
                                <button id="personalInfoButton" class="list-group-item py-1" onclick="showPersonalInfo()"><i
                                        class='bx bx-folder me-2'></i><span>{!! __('language.personal') !!}</span></button>
                                <button class="list-group-item py-1" onclick="fetchMyOrders()"><i
                                        class='bx bx-folder me-2'></i><span>{!! __('language.mo') !!}</span></button>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-12 col-lg-8 m-3">
                <div id="personalInfoCard" class="card" style="display: none;">
                    <div class="card-body">
                        <header class="card-header">
                            <h4 class="card-title mt-2">{!! __('language.mypersonal') !!}</h4>
                            <small class=" " style="color: green">We'll never share your "Personal Information" with
                                anyone else.</small>
                        </header>
                        <article class="card-body">
                            <form action="{{ route('update.personal.info') }}" method="POST">
                                @csrf
                                <div class="form-group">
                                    <label>Name</label>
                                    <input type="text" class="form-control" value="{{ Auth::user()->name ?? '' }}"
                                        name="name" required>
                                </div>
                                <div class="form-group">
                                    <label>Mobile Number</label>
                                    <input type="text" class="form-control" value="{{ Auth::user()->mobile ?? '' }}"
                                        name="mobile" required>
                                </div>
                                <div class="form-group">
                                    <label>Address</label>
                                    <input type="text" class="form-control" value="{{ Auth::user()->address ?? '' }}"
                                        name="address" required>
                                </div>
                                <div class="form-group">
                                    <label>Email Address</label>
                                    <input type="email" class="form-control" value="{{ Auth::user()->email ?? '' }}"
                                        name="email" required>
                                </div>
                                <div class="form-group">
                                    <label>New Password</label>
                                    <input type="password" class="form-control" name="password">
                                    <small class="" style="color: green">Now your default password is your phone
                                        number. Leave blank if you don't want to change the password.</small>
                                </div>
                                <div class="form-group">
                                    <label>Confirm Password</label>
                                    <input type="password" class="form-control" name="password_confirmation">
                                </div>
                                <div class="col-md-12 mt-4">
                                    <button type="submit" class="subscribe btn btn-success btn-lg btn-block">Update My
                                        Information</button>
                                </div>
                            </form>
                        </article>
                    </div>
                </div>
                <div id="orderCard" class="card" style="display: none;">
                    <div class="card-body">
                        <header class="card-header">
                            <h4 class="card-title mt-2">{!! __('language.mao') !!}</h4>
                        </header>
                        <article class="card-body">
                            <table class="table table-striped">
                                <thead>
                                    <tr>
                                        {{-- <th scope="col">#</th> --}}
                                        <th scope="col">Order ID</th>
                                        <th scope="col">Product Name</th>
                                        <th scope="col">Total Quantity</th>
                                        <th scope="col">Total Amount</th>
                                        <th scope="col">Address</th>
                                        <th scope="col">Payment Status</th>
                                        <th scope="col">Status</th>
                                        @if (Auth::user()->role == 3)
                                            <th scope="col">My Status</th>
                                            <th scope="col">Phone Number</th>
                                            <th scope="col">Action</th>
                                        @endif
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($orders as $order)

                                        <tr>
                                            <td scope="col">{{ $order->id }}</td>
                                            <td scope="col">{{ $order->productName }}</td>
                                            <td scope="col">{{ $order->quantity }}</td>
                                            <td scope="col">{{ $order->totalAmount }}</td>
                                            <td scope="col">{{ $order->address }}</td>
                                            <td scope="col">{{ $order->payment_status }}</td>
                                            <td scope="col">{{ $order->current_status }}</td>
                                            @if (Auth::user()->role == 3)
                                                <td scope="col">{{ $order->driver_status }}</td>
                                                <td scope="col">{{ $order->customer }}</td>
                                                <td class="text-center">
                                                    <div class="dropdown">
                                                        <a href="javascript:void(0)" class="text-danger fa fa-ellipsis-v"
                                                            type="button" data-toggle="dropdown"></a>
                                                        <ul class="dropdown-menu dropdown-menu-right">
                                                            <li>
                                                                <a href="{{ route('driverstatus.edit', $order->id) }}" title="Edit">
                                                                    <i class="fa fa-pencil-square-o"></i> Edit
                                                                </a>
                                                            </li>
                                                        </ul>
                                                    </div>
                                                </td>
                                            @endif
                                        </tr>
                                    @endforeach

                                </tbody>
                            </table>
                        </article>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection

<script>
    function showPersonalInfo() {
        var personalInfoCard = document.getElementById('personalInfoCard');
        personalInfoCard.style.display = 'block';
        orderCard.style.display = 'none';
    }

    function fetchMyOrders() {
        var orderCard = document.getElementById('orderCard');
        personalInfoCard.style.display = 'none';
        orderCard.style.display = 'block';
    }
</script>
