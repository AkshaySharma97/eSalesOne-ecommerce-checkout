@extends('layouts.app')

@section('content')
<h2 class="mb-4">Your Cart</h2>
@if(session('cart'))
    <ul class="list-group mb-3">
        @foreach(session('cart') as $item)
            <li class="list-group-item">
                <strong>{{ $item['title'] }}</strong> ({{ $item['variant'] }}) x{{ $item['quantity'] }}
                <span class="float-end">₹{{ number_format(($item['price'] * $item['quantity']) , 2) }}</span>
            </li>
        @endforeach
    </ul>
    <a href="{{ route('checkout') }}" class="btn btn-primary">Proceed to Checkout</a>
@else
    <p>Your cart is empty.</p>
@endif
@endsection
