@extends('layouts.app')

@section('content')
<div class="container">
    <h3 class="mb-4">Your Cart</h3>

    @if(session('cart') && count($cart))
        <ul class="list-group mb-3">
            @foreach($cart as $index => $item)
                <li class="list-group-item d-flex justify-content-between align-items-center">
                    <div>
                        <img src="{{ $item['image'] }}" width="50" class="me-3">
                        <strong>{{ $item['title'] }}</strong> ({{ $item['variant'] }}) × {{ $item['quantity'] }}
                    </div>
                    <div>
                        ₹{{ number_format(($item['price'] * $item['quantity']), 2) }}
                        <form action="{{ route('cart.remove', $index) }}" method="POST" class="d-inline ms-2">
                            @csrf @method('DELETE')
                            <button class="btn btn-sm btn-outline-danger">Remove</button>
                        </form>
                    </div>
                </li>
            @endforeach
        </ul>

        <div class="d-flex justify-content-between align-items-center">
            <h5>Total: ₹{{ number_format($total , 2) }}</h5>
            <div>
                <form action="{{ route('cart.clear') }}" method="POST" class="d-inline">
                    @csrf @method('DELETE')
                    <button class="btn btn-outline-secondary btn-sm">Clear Cart</button>
                </form>
                <a href="{{ route('checkout') }}" class="btn btn-primary btn-sm">Proceed to Checkout</a>
            </div>
        </div>
    @else
        <p>Your cart is empty.</p>
    @endif
</div>
@endsection
