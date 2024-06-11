
@extends('backend.layout.app')
@section('title', 'E-Commerce Site')
@section('content')

    <div class="container">
        <h1>Order Management</h1>
        <div class="mb-3">
            <form action="{{ route('orders.index') }}" method="GET">
                <div class="row">
                    <div class="col">
                        <input type="text" name="customer" class="form-control" placeholder="Search by customer">
                    </div>
                    <div class="col">
                        <select name="status" class="form-control">
                            <option value="">Filter by status</option>
                            <option value="pending">Pending</option>
                            <option value="completed">Completed</option>
                            <!-- Add more status options if needed -->
                        </select>
                    </div>
                    <div class="col">
                        <button type="submit" class="btn btn-primary">Search</button>
                    </div>
                </div>
            </form>
        </div>
        <table class="table">
            <thead>
                <tr>
                    <th>ID</th>
                    <th>Customer</th>
                    <th>Status</th>
                    <!-- Add more table headers as needed -->
                </tr>
            </thead>
            <tbody>
                @foreach($orders as $order)
                    <tr>
                        <td>{{ $order->id }}</td>
                        <td>{{ $order->customer->name }}</td>
                        <td>{{ ucfirst($order->status) }}</td>
                        <!-- Add more order details in table rows -->
                    </tr>
                @endforeach
            </tbody>
        </table>
        {{ $orders->links() }}
    </div>
@endsection
