<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Product;
class CartController extends Controller
{
    public function addToCart(Request $request)
    {
        $request->validate([
            'product_id' => 'required|exists:products,id',
            'variant' => 'required|string',
            'quantity' => 'required|integer|min:1|max:10',
        ]);

        $product = Product::findOrFail($request->product_id);

        $inventory = $product->inventories()->where('variant', $request->variant)->first();

        if (!$inventory || $inventory->quantity < $request->quantity) {
            return back()->with('error', 'Not enough stock for selected variant.');
        }

        $cart = session()->get('cart', []);

        $cart[] = [
            'product_id' => $product->id,
            'title' => $product->title,
            'variant' => $request->variant,
            'quantity' => $request->quantity,
            'price' => $product->price,
            'image' => $product->image_url,
        ];

        session()->put('cart', $cart);

        return redirect()->back()->with('success', 'Product added to cart.');
    }

    public function showCart()
    {
        $cart = session('cart', []);
        $total = collect($cart)->sum(fn($item) => $item['price'] * $item['quantity']);

        return view('show', compact('cart', 'total'));
    }

    public function removeItem($index)
    {
        $cart = session('cart', []);
        unset($cart[$index]);
        session()->put('cart', array_values($cart));

        return back()->with('success', 'Item removed.');
    }

    public function clearCart()
    {
        session()->forget('cart');
        return back()->with('success', 'Cart cleared.');
    }

    public function quickCheckout(Request $request)
    {
        $request->validate([
            'product_id' => 'required|exists:products,id',
            'variant' => 'required|string',
            'quantity' => 'required|integer|min:1|max:10',
        ]);

        $product = Product::findOrFail($request->product_id);

        $inventory = $product->inventories()->where('variant', $request->variant)->first();

        if (!$inventory || $inventory->quantity < $request->quantity) {
            return back()->with('error', 'Not enough stock for selected variant.');
        }

        $quickCart = [[
            'product_id' => $product->id,
            'title' => $product->title,
            'variant' => $request->variant,
            'quantity' => $request->quantity,
            'price' => $product->price,
            'image' => $product->image_url,
        ]];

        session()->put('cart', $quickCart);

        return redirect()->route('checkout');
    }

}
