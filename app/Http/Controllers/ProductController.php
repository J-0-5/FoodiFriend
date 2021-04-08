<?php

namespace App\Http\Controllers;

use App\Commerce;
use App\Product;
use App\ProductCategory;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class ProductController extends Controller
{
    public function index()
    {
        $commerces = Commerce::get();

        $productCategories = ProductCategory::get();

        $id = Auth::user()->id;

        if ($id != 1) {
            $commerce_id = Auth::user()->getCommerce->id;

            $productCategories = $productCategories->where('commerce_id', $commerce_id);
        }

        $products = Product::name(request('name'))
            ->commerce(request('commerce_id'))
            ->category(request('productCategory_id'))
            ->state(request('state'))
            ->get();

        return view('product.index', compact('commerces', 'productCategories', 'products'));
    }
}
