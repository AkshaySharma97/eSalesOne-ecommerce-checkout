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
        $cart = session('cart', []);
    
        if (empty($cart)) {
            return redirect('/')->with('error', 'Your cart is empty.');
        }

        $total = collect($cart)->sum(function ($item) {
            return $item['price'] * $item['quantity'];
        });

        return view('checkout', compact('cart', 'total'));
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
        ]);

        $cart = session('cart', []);

        if (empty($cart)) {
            return redirect()->back()->with('error', 'Cart is empty. Please add products before checkout.');
        }

        // Simulate payment outcome via CVV
        $status = match ($request->cvv) {
            '111' => 'approved',
            '222' => 'declined',
            '333' => 'failed',
            default => 'approved',
        };

        // Create order
        $order = Order::create([
            'order_number' => uniqid('ORD-'),
            'full_name' => $validated['full_name'],
            'email' => $validated['email'],
            'phone' => $validated['phone'],
            'address' => $validated['address'],
            'city' => $validated['city'],
            'state' => $validated['state'],
            'zip' => $validated['zip'],
            'status' => $status,
        ]);

        // Process each cart item
        foreach ($cart as $item) {
            $inventory = Inventory::where('product_id', $item['product_id'])
                ->where('variant', $item['variant'])
                ->first();

            if ($inventory) {
                if ($inventory->quantity < $item['quantity']) {
                    return redirect()->back()->with('error', "Insufficient stock for {$item['title']} - {$item['variant']}.");
                }

                $inventory->decrement('quantity', $item['quantity']);
            }

            OrderItem::create([
                'order_id' => $order->id,
                'product_id' => $item['product_id'],
                'variant' => $item['variant'],
                'quantity' => $item['quantity'],
                'price' => $item['price'] * $item['quantity'], // Total price for the item
            ]);
        }

        // Clear cart session
        session()->forget('cart');

        // Send email via Mailtrap
        if ($status === 'approved') {
            Mail::to($order->email)->send(new \App\Mail\OrderConfirmation($order));
        } else {
            Mail::to($order->email)->send(new \App\Mail\OrderFailure($order));
        }

        // Redirect to Thank You page
        return redirect()->to('/thank-you/' . $order->id);
    }

}
