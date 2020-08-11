<?php

namespace App\Http\Controllers;

use App\Models\Product;

class HomeController extends Controller
{
    public function __invoke()
    {
        $products = Product::all();
        //$products = collect([]);
        return view('products.index', compact('products'));
    }
}
