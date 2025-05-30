@component('mail::message')
# Oops, {{ $order->full_name }}

Unfortunately, your order **#{{ $order->order_number }}** could not be processed due to a payment issue.

Please retry the checkout or contact support.

Thanks,<br>
{{ config('app.name') }}
@endcomponent
