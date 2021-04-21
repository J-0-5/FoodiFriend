<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Order;
use App\OrderDetails;
use App\Product;
use App\User;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Collection;

class OrderController extends Controller
{

    public function index()
    {
        if (Auth::user()->id != 1) {
            $orders = Order::where('commerce_id', Auth::user()->getCommerce->id)->paginate(10);
        } else {
            $orders = Order::paginate(10);
        }
        
        return view('order.index', compact('orders'));
    }

    public function update(Request $request, $id)
    {
        $order = Order::where('id', $id)->update(['status' => $request->status]);

        if (!empty($order)) {
            return response()->json(['code' => 200, 'data' => $order, 'message' => 'Estado actualizado'], 200);
        } else {
            return response()->json(['code' => 500, 'data' => null, 'message' => 'error'], 500);
        }
    }

    public function show($id)
    {   
        $orderDetails = OrderDetails::where('order_id',$id)->get();
        $order = Order::where('id', $id)->get();
        return view('order.details', compact('orderDetails', 'order','id'));
    }

    public function destroy($id)
    {

    }
}
