<?php

namespace App\Http\Controllers;

use App\Models\Product;

class CartController extends Controller
{
    public function addProduct(Product $product)
    {
        $this->storeProductInCart($product);

        return back()->withSuccess('Product added to cart successfully!');
    }

    protected function storeProductInCart(Product $product)
    {
        if (session()->has('cart')) {
            $cart = session('cart');
            $cart->push($product);
            session(compact('cart'));
        } else {
            session(['cart' => collect([$product])]);
        }
    }

    public function index()
    {
        $products = session('cart');
        if(!$products){
            return redirect()->route('home')->withError('No product in cart');
        }
        return view('carts.index', compact('products'));
    }

    public function clear()
    {
        session()->forget('cart');
        return redirect()->route('home')->withSuccess('Your cart has been cleared');
    }
}
