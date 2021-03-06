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

        return view('Front.type', compact('commerceTypes'));
    }

    public function commerces($type)
    {
        $commerces = Commerce::where('type', $type)->where('state', 1)->get();

        return view('Front.commerces', compact('commerces'));
    }

    public function products($commerce_id)
    {

        if (\Cart::getContent()->count() > 0) {
            foreach (\Cart::getContent() as $item) {
                if ($item->attributes[0]->getCommerce->id != $commerce_id) {
                    \Cart::clear();
                }
            }
        }

        $commerce = Commerce::where('id', $commerce_id)->first();

        $categories = ProductCategory::where('commerce_id', $commerce_id)->where('state', 1)->get();

        $products = Product::category(request('category_id'))->where('commerce_id', $commerce_id)->where('state', 1)->get();

        return view('Front.products', compact('commerce', 'categories', 'products'));
    }
}
