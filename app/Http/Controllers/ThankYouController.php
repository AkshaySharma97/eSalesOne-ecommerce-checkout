<?php

namespace App\Http\Controllers;

use App\Models\Order;
use Illuminate\Http\Request;

class ThankYouController extends Controller
{
    public function show($id)
    {
        $order = Order::with('items.product')->findOrFail($id);
        return view('thank-you', compact('order'));
    }
}