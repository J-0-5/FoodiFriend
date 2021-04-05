<?php

namespace App\Http\Controllers;

use App\Commerce;
use App\ProductCategory;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class ProductCategoryController extends Controller
{

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */


    public function index()
    {
        $productCategory = ProductCategory::name(request()->name)->CommerceId(request()->CommerceId)->state(request()->state)->filterByCommerce()->get();
        $commerces = Commerce::get();

        return view('productCategories.index', compact('productCategory','commerces'));
    }

    public function create()
    {
        return view('ProductCategories.create');
    }

    public function store()
    {
        if (Auth::user()->id == 1) {
            $commerce_id = request('commerce_id');
        } else {
            $commerce_id = Auth::user()->getCommerce->id;
        }

        ProductCategory::create([
            'name' => request('name'),
            'commerce_id' => $commerce_id,
            'description' => request('description')
        ]);

        return back()->with('status', __('Category created successfully'));
    }

    public function show(ProductCategory $productCategory)
    {
        $productCategory = ProductCategory::get();
        return view('productCategories.index', compact('productCategory'));
    }

    public function edit($id)
    {
        $productCategory = ProductCategory::where('id', $id)->first();
        $commerces = Commerce::get();
        
        if (!empty($productCategory)) {
            return response()->json(['code' => 200, 'data' => $productCategory, 'CommerceSelected' => $productCategory->getCommerce, 'commerces' => $commerces], 200);
        } else {
            return response()->json(['code' => 404, 'data' => null, 'message' => 'Categoria de producto no encontrada'], 404);
        }

        //return view('productCategories.edit', compact('productCategory'));
    }

    public function update(ProductCategory $productCategory)
    {
        $productCategory->update([
            'name' => request('name'),
            'description' => request('description'),
            'state' => request('state')
        ]);

        return redirect()->route('productCategory.index');
    }

    public function destroy(ProductCategory $productCategory)
    {
        $productCategory->delete();
        return back()->with('status', __('Category deleted successfully'));
    }
}
