@component('mail::message')
# Thank You, {{ $order->full_name }}

Your order **#{{ $order->order_number }}** has been successfully placed.

**Order Details:**

@foreach ($order->items as $item)
- {{ $item->product->title }} ({{ $item->variant }}) x {{ $item->quantity }} - ₹{{ $item->price * $item->quantity }}
@endforeach

**Total:** ₹{{ $order->items->sum(fn($i) => $i->price * $i->quantity) }}

We'll notify you once your product ships.

Thanks,<br>
{{ config('app.name') }}
@endcomponent
