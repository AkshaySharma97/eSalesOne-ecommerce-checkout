@extends('layouts.app')

@section('content')
<div class="text-center">
    <h2 class="mb-4">Thank You for Your Purchase!</h2>
    <h5>Order Number: <strong>{{ $order->order_number }}</strong></h5>
</div>

<div class="card my-4">
    <div class="card-header bg-success text-white">Order Details</div>
    <div class="card-body">
        <p><strong>Name:</strong> {{ $order->full_name }}</p>
        <p><strong>Email:</strong> {{ $order->email }}</p>
        <p><strong>Product:</strong> {{ $order->items->product }}</p>
        <p><strong>Variant:</strong> {{ $order->items->variant }}</p>
        <p><strong>Quantity:</strong> {{ $order->items->quantity }}</p>
        <p><strong>Total Paid:</strong> ₹{{ number_format($order->items->price / 100, 2) }}</p>
        <p><strong>Address:</strong> {{ $order->address }}, {{ $order->city }}, {{ $order->state }}, {{ $order->zip }}</p>
    </div>
</div>
@endsection
