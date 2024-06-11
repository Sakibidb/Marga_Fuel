



@extends('backend.layout.app')
@section('title', 'E-Commerce Site')
@section('content')

<div class="container">
        <h1>Order Details</h1>
        <p><strong>Order ID:</strong> {{ $order->id }}</p>
        <p><strong>Customer:</strong> {{ $order->customer->name }}</p>
    </div>
@endsection
