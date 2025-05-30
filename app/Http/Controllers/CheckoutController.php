<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Order;
use App\Models\OrderItem;
use App\Models\Product;
use App\Models\Inventory;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\Mail;
use App\Mail\OrderConfirmation;
use App\Mail\OrderFailure;

class CheckoutController extends Controller
{
    public function index(Request $request)
    {
        $product = Product::with('inventories')->first();
        $variant = $request->get('variant');
        $quantity = $request->get('quantity', 1);

        return view('checkout', compact('product', 'variant', 'quantity'));
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'full_name' => 'required|string',
            'email' => 'required|email',
            'phone' => 'required|regex:/^[0-9]{10}$/',
            'address' => 'required|string',
            'city' => 'required|string',
            'state' => 'required|string',
            'zip' => 'required|string',
            'card_number' => 'required|digits:16',
            'expiry' => 'required|date|after:today',
            'cvv' => 'required|digits:3',
            'variant' => 'required|string',
            'quantity' => 'required|integer|min:1',
        ]);

        // Simulate payment outcomes
        $cvv_code = $request->cvv;

        $status = match ($cvv_code) {
            '1' => 'approved',
            '2' => 'declined',
            '3' => 'failed',
            default => 'approved',
        };

        // Create order
        $order = Order::create([
            'order_number' => Str::uuid(),
            'full_name' => $request->full_name,
            'email' => $request->email,
            'phone' => $request->phone,
            'address' => $request->address,
            'city' => $request->city,
            'state' => $request->state,
            'zip' => $request->zip,
            'status' => $status,
        ]);

        $product = Product::first();
        $price = $product->price;
        $quantity = $request->quantity;

        OrderItem::create([
            'order_id' => $order->id,
            'product_id' => $product->id,
            'variant' => $request->variant,
            'quantity' => $quantity,
            'price' => $price,
        ]);

        // Decrease inventory
        Inventory::where('product_id', $product->id)
            ->where('variant', $request->variant)
            ->decrement('quantity', $quantity);

        // Send email
        if ($status === 'approved') {
            Mail::to($order->email)->send(new OrderConfirmation($order));
        } else {
            Mail::to($order->email)->send(new OrderFailure($order));
        }

        return redirect()->to('/thank-you/' . $order->id);
    }
}
