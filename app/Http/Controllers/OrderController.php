<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Order;
use App\OrderDetails;
use App\User;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;

class OrderController extends Controller
{
    function index()
    {
        if(Auth::user()->id != 1){
            $orders = DB::select('select * from orders where commerce_id = ?', [Auth::user()->getCommerce->id]);
        }else{
            $orders = Order::get();
        }
        
        $orderDetails = OrderDetails::get();
        $users = User::get();
        $number = 0;
        
        //return Auth::user()->getCommerce->id;
        //return $orders;

        return view('Order.index', compact('orders','number','users'));
    }

    function status($id)
    {
        $order = Order::where('id', $id)->first();
        
        if (!empty($order)) {
            return response()->json(['code' => 200, 'data' => $order], 200);
        } else {
            return response()->json(['code' => 404, 'data' => null, 'message' => 'Categoria de producto no encontrada'], 404);
        }

        return $order;
    }

    function update($id)
    {
        
    }
}
