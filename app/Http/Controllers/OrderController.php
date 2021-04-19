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
}
