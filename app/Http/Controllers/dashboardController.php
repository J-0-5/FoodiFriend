<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class dashboardController extends Controller
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
        $activeProducts = \App\Product::where('state', '1')->count();
        $activeUsers = \App\User::where('state', '1')->count();
        $activeCommerce = \App\Commerce::where('state', '1')->count();
        return view('Dashboard\dash', compact('activeProducts', 'activeUsers', 'activeCommerce'));

    }

    // filter by date 
    public function filter(request $request)
    {
        $startDate = $request->input('startDate');
        $endDate = $request->input('endDate');
        $activeCommerce = \App\Commerce::where('state', '1')
                        ->where('created_at', '>=', $startDate)
                        ->where('created_at', '<=', $endDate)
                        ->count();
        $activeUsers = \App\User::where('state', '1')
                    ->where('created_at', '>=', $startDate)
                    ->where('created_at', '<=', $endDate)
                    ->count();
        $activeProducts = \App\Product::where('state', '1')
                    ->where('created_at', '>=', $startDate)
                    ->where('created_at', '<=', $endDate)
                    ->count();
        return view('Dashboard\dash', compact('activeProducts', 'activeUsers', 'activeCommerce'));
    }
}

