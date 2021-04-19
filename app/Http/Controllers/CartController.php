<?php

namespace App\Http\Controllers;

use App\Product;
use Illuminate\Http\Request;

class CartController extends Controller
{
    public function add(Request $request)
    {
        $product = Product::find($request->id);
        \Cart::add(
            $product->id,
            $product->name,
            $product->price,
            1,
            array($product)
        );
        return back()->with('status', 'Producto agregado');
    }

    public function remove(Request $request)
    {
        \Cart::remove(['id'=> $request->id]);
        return back()->with('status', 'Producto removido');
    }

    public function clear()
    {
        \Cart::clear();
        return back()->with('status', 'Producto removido');
    }

    public function checkout()
    {
        return view('Front.checkout');
    }
}
