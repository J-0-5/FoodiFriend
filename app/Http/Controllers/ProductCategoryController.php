<?php

namespace App\Http\Controllers;

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
        $productCategory = ProductCategory::get();

        return view('productCategories.index', compact('productCategory'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('ProductCategories.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store()
    {
        //return request('description');
        ProductCategory::create([
            'name' => request('name'),
            'commerce_id' => Auth::user()->id,
            'description' => request('description')
        ]);

        return back()->with('status', __('Category created successfully'));
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show(ProductCategory $productCategory)
    {   
        $productCategory = ProductCategory::get();
        return view('productCategories.index', compact('productCategory'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit(ProductCategory $productCategory)
    {
        //return $productCategory;
        return view('productCategories.edit', compact('productCategory'));

        
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id 
     * @return \Illuminate\Http\Response
     */

    public function update(ProductCategory $productCategory)
    {   
        $productCategory->update([
            'name' => request('name'),
            'description' => request('description'),
            'state' => request('state')
        ]);

        return redirect()->route('productCategory.show', $productCategory);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(ProductCategory $productCategory)
    {
        $productCategory->delete();
        return back()->with('status', __('Category deleted successfully'));
    }
}
