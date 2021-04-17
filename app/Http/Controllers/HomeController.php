<?php

namespace App\Http\Controllers;

use App\Commerce;
use App\CommerceType;
use App\Product;
use App\ProductCategory;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class HomeController extends Controller
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
        if (Auth::user()->id == 1 || Auth::user()->getCommerce) {
            return view('home');
        }

        $commerceTypes = CommerceType::where('state', 1)->get();

        return view('Home.type', compact('commerceTypes'));
    }

    public function commerces($type)
    {
        $commerces = Commerce::where('type', $type)->get();

        return view('Home.commerces', compact('commerces'));
    }

    public function products($commerce_id)
    {
        $commerce = Commerce::where('id', $commerce_id)->first();

        $categories = ProductCategory::where('commerce_id', $commerce_id)->where('state', 1)->get();

        $products = Product::where('commerce_id', $commerce_id)->where('state', 1)->get();

        return view('Home.products', compact('commerce', 'categories', 'products'));
    }
}
