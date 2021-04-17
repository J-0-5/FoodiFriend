<?php

namespace App\Http\Controllers;

use App\Commerce;
use App\Product;
use App\User;
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
        $activeProducts = Product::where('state', 1)->date(request('startDate'), request('endDate'))->count();
        $activeUsers = User::where('state', 1)->date(request('startDate'), request('endDate'))->count();
        $activeCommerce = Commerce::where('state', 1)->count();

        return view('Dashboard.index', compact('activeProducts', 'activeUsers', 'activeCommerce'));
    }

}
