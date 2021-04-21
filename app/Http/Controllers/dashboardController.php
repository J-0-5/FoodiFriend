<?php

namespace App\Http\Controllers;

use App\Commerce;
use App\Product;
use App\User;
use App\Order;
use Illuminate\Http\Request;

class DashboardController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        // active filter
        $activeProducts = Product::where('state', 1)
                        ->date(request('startDate'), request('endDate'))
                        ->count();
        $activeUsers = User::where('state', 1)
                    ->date(request('startDate'), request('endDate'))
                    ->count();
        $activeCommerce = Commerce::where('state', 1)
                        ->date(request('startDate'), request('endDate'))
                        ->count();
        //inactive filter                
        $inactiveProducts = Product::where('state', 0)
                        ->date(request('startDate'), request('endDate'))
                        ->count();
        $inactiveUsers = User::where('state', 0)
                    ->date(request('startDate'), request('endDate'))
                    ->count();
        $inactiveCommerce = Commerce::where('state', 0)
                        ->date(request('startDate'), request('endDate'))
                        ->count();

        $ordersCTR = Order::where('status', 1)->where('status', 3)->where('status', 4)->where('status', 5)
                        ->date(request('startDate'), request('endDate'))
                        ->count();

        $salesCTR = Order::where('status', 2)
                        ->date(request('startDate'), request('endDate'))
                        ->count();


        return view('Dashboard.index', compact('activeProducts', 'activeUsers', 'activeCommerce', 'inactiveUsers', 'inactiveProducts','inactiveCommerce' ,'ordersCTR', 'salesCTR' ));
    }
                
}