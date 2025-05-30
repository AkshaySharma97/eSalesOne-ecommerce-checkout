<?php

namespace App\Http\Controllers;
use App\Models\Product;
use Illuminate\Http\Request;

class LandingController extends Controller
{
    public function index(Request $request)
    {
        $query = Product::query();

        if ($request->has('category') && $request->category != '') {
            $query->where('category', $request->category);
        }

        $categories = Product::select('category')->distinct()->pluck('category');
        $products = $query->with('inventories')->paginate(8);

        return view('landing', compact('products', 'categories'));
    }
}
