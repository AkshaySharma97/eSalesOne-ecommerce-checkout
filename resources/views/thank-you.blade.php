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
        <p><strong>Phone:</strong> {{ $order->phone }}</p>
        <p><strong>Address:</strong> {{ $order->address }}, {{ $order->city }}, {{ $order->state }}, {{ $order->zip }}</p>

        <hr>

        <h5>Items Purchased:</h5>
        <ul class="list-group">
            @foreach ($order->items as $item)
                <li class="list-group-item">
                    <img src="{{ $item->product->image_url }}" width="50" class="me-3">
                    <strong>{{ $item->product->title }}</strong> - Variant: {{ $item->variant }} - 
                    Qty: {{ $item->quantity }} - 
                    ₹{{ number_format($item->price , 2) }}
                </li>
            @endforeach
        </ul>

        <hr>
        <p class="mt-3"><strong>Total Paid:</strong>
            ₹{{ number_format($order->items->sum('price') , 2) }}
        </p>
    </div>
</div>
@endsection
