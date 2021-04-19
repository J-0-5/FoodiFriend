<?php

namespace App\Http\Controllers;

use App\Order;
use App\OrderDetails;
use App\Product;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

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
        \Cart::remove(['id' => $request->id]);
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

    public function order(Request $request)
    {
        $commerce_id = 0;
        $sw = 0;
        foreach (\Cart::getContent() as $item) {
            if ($sw == 0) {
                $sw = 1;
                $commerce_id = $item->attributes[0]->getCommerce->id;
                $customer_id = Auth::user()->id;
                $description = $request->description;
                $payment_type = $request->paymentType;
                $total = \Cart::getSubTotal() + 7000;
                $order = Order::create([
                    'commerce_id' => $commerce_id,
                    'customer_id' => $customer_id,
                    'description' => $description,
                    'payment_type' => $payment_type,
                    'total' => $total,
                ]);
            }

            OrderDetails::create([
                'order_id' => $order->id,
                'product_id' => $item->id,
                'quantity' => $item->quantity,
            ]);

        }
        \Cart::clear();
        return redirect(route('home.products',$commerce_id))->with('status', 'Pedido realizado');
    }
}
