@extends('layouts.app')

@section('content')
<h2 class="mb-4">Product Catalog</h2>

{{-- Filter form outside of grid --}}
<form method="GET" class="mb-4 d-flex align-items-center gap-3 flex-wrap">
    <label for="category" class="form-label mb-0 fw-semibold">Filter by Category:</label>
    <select id="category" name="category" class="form-select w-auto" onchange="this.form.submit()">
        <option value="">All Categories</option>
        @foreach($categories as $cat)
            <option value="{{ $cat }}" {{ request('category') == $cat ? 'selected' : '' }}>{{ $cat }}</option>
        @endforeach
    </select>
</form>

{{-- Product grid --}}
<div class="row row-cols-1 row-cols-md-4 g-4">
    @foreach($products as $product)
    <div class="col">
        <div class="card h-100 shadow-sm">
            <img src="{{ $product->image_url }}" class="card-img-top" alt="{{ $product->title }}">
            <div class="card-body d-flex flex-column">
                <h5 class="card-title">{{ $product->title }}</h5>
                <p class="card-text text-truncate" style="max-height: 3em;">{{ $product->description }}</p>
                <p class="fw-bold mb-3">₹{{ number_format($product->price) }}</p>

                <form action="{{ url('/checkout') }}" method="GET" class="mt-auto">
                    <div class="mb-2">
                        <select name="variant" class="form-select" required>
                            <option value="">Select Variant</option>
                            @foreach($product->inventories as $inv)
                            <option value="{{ $inv->variant }}">{{ $inv->variant }}</option>
                            @endforeach
                        </select>
                    </div>
                    <div class="mb-2">
                        <input type="number" name="quantity" class="form-control" value="1" min="1" max="10" required>
                    </div>
                    <button type="submit" class="btn btn-primary w-100">Buy Now</button>
                </form>
            </div>
        </div>
    </div>
    @endforeach
</div>

{{-- Pagination centered and spaced --}}
<div class="mt-5 d-flex justify-content-center">
    {!! $products->withQueryString()->links('pagination::bootstrap-5') !!}
</div>

@endsection
