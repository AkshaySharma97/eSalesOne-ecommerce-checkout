@extends('layouts.app')

@section('content')
<div class="container">
    <h3 class="mb-4">Checkout</h3>

    <div class="row">
        <div class="col-md-7">
            <form action="{{ route('checkout') }}" method="POST">
                @csrf

                <div class="mb-3">
                    <label class="form-label">Full Name</label>
                    <input type="text" name="full_name" 
                        class="form-control @error('full_name') is-invalid @enderror" 
                        value="{{ old('full_name') }}" required>
                    @error('full_name')
                        <div class="invalid-feedback">{{ $message }}</div>
                    @enderror
                </div>

                <div class="mb-3">
                    <label class="form-label">Email</label>
                    <input type="email" name="email" 
                        class="form-control @error('email') is-invalid @enderror" 
                        value="{{ old('email') }}" required>
                    @error('email')
                        <div class="invalid-feedback">{{ $message }}</div>
                    @enderror
                </div>

                <div class="mb-3">
                    <label class="form-label">Phone Number</label>
                    <input type="text" name="phone" 
                        class="form-control @error('phone') is-invalid @enderror" 
                        pattern="\d{10}" 
                        value="{{ old('phone') }}" required>
                    @error('phone')
                        <div class="invalid-feedback">{{ $message }}</div>
                    @enderror
                </div>

                <div class="mb-3">
                    <label class="form-label">Address</label>
                    <textarea name="address" 
                            class="form-control @error('address') is-invalid @enderror" 
                            required>{{ old('address') }}</textarea>
                    @error('address')
                        <div class="invalid-feedback">{{ $message }}</div>
                    @enderror
                </div>

                <div class="row g-2 mb-3">
                    <div class="col-md-4">
                        <label class="form-label">City</label>
                        <input type="text" name="city" 
                            class="form-control @error('city') is-invalid @enderror" 
                            value="{{ old('city') }}" required>
                        @error('city')
                            <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>
                    <div class="col-md-4">
                        <label class="form-label">State</label>
                        <input type="text" name="state" 
                            class="form-control @error('state') is-invalid @enderror" 
                            value="{{ old('state') }}" required>
                        @error('state')
                            <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>
                    <div class="col-md-4">
                        <label class="form-label">Zip Code</label>
                        <input type="text" name="zip" 
                            class="form-control @error('zip') is-invalid @enderror" 
                            value="{{ old('zip') }}" required>
                        @error('zip')
                            <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>
                </div>

                <h5 class="mt-4">Card Details</h5>

                <div class="mb-3">
                    <label class="form-label">Card Number</label>
                    <input type="text" name="card_number" 
                        class="form-control @error('card_number') is-invalid @enderror" 
                        pattern="\d{16}" 
                        value="{{ old('card_number') }}" maxlength="16" required>
                    @error('card_number')
                        <div class="invalid-feedback">{{ $message }}</div>
                    @enderror
                </div>

                <div class="row g-2">
                    <div class="col-md-6">
                        <label class="form-label">Expiry Date</label>
                        <input type="month" name="expiry" 
                            class="form-control @error('expiry') is-invalid @enderror" 
                            value="{{ old('expiry') }}" required>
                        @error('expiry')
                            <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>
                    <div class="col-md-6">
                        <label class="form-label">CVV</label>
                        <input type="text" name="cvv" 
                            class="form-control @error('cvv') is-invalid @enderror" 
                            pattern="\d{3}" 
                            value="{{ old('cvv') }}" maxlength="3" required>
                        @error('cvv')
                            <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>
                </div>
                <button type="submit" class="btn btn-success mt-3 w-100">Place Order</button>
            </form>
        </div>

        <div class="col-md-5">
            <div class="card">
                <div class="card-header bg-secondary text-white">Order Summary</div>
                <ul class="list-group list-group-flush">
                    @foreach ($cart as $item)
                        <li class="list-group-item d-flex justify-content-between align-items-center">
                            <div>
                                <div class="fw-bold">{{ $item['title'] }}</div>
                                <div>Variant: {{ $item['variant'] }}</div>
                                <div>Qty: {{ $item['quantity'] }}</div>
                                <div>₹{{ number_format($item['price'] * $item['quantity'] , 2) }}</div>
                            </div>
                            <img src="{{ $item['image'] }}" width="60" class="ms-3 rounded" alt="{{ $item['title'] }}">
                        </li>
                    @endforeach
                </ul>
                <div class="card-footer text-end">
                    <strong>Total: ₹{{ number_format($total , 2) }}</strong>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
