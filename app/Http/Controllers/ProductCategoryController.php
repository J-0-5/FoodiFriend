<?php

namespace App\Http\Controllers;

use App\Commerce;
use App\Product;
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
        $productCategories = ProductCategory::filterByCommerce()
            ->name(request('name'))
            ->CommerceId(request('commerce_id'))
            ->state(request('state'))
            ->paginate(10);

        $commerces = Commerce::get();

        return view('productCategory.index', compact('productCategories', 'commerces'));
    }

    public function create()
    {
        return view('ProductCategories.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required|string',
            'commerce_id' => 'nullable|exists:commerce,id',
            'description' => 'required',
        ]);

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
            return response()->json(['code' => 200, 'data' => $productCategory, 'CommerceSelected' => $productCategory->getCommerce, 'commerces' => $commerces, 'userId' => Auth::user()->id], 200);
        } else {
            return response()->json(['code' => 404, 'data' => null, 'message' => 'Categoria de producto no encontrada'], 404);
        }
    }

    public function update(Request $request, $id)
    {
        $request->validate([
            'name' => 'required|string',
            'commerce_id' => 'nullable|exist:commerce,id',
            'description' => 'required',
            'state' => 'required',
        ]);

        $productCategory = ProductCategory::where('id', $id)->first();

        $productCategory->name = request('name');

        if (Auth::user()->id == 1) {
            $productCategory->commerce_id = request('commerce_id');
        }

        $productCategory->description = request('description');
        $productCategory->state = request('state');
        $productCategory->update();

        return back()->with('status', __('Product category updated successfully'));
    }

    public function destroy($id)
    {
        if (Product::where('category_id', $id)->delete()) {
            if (ProductCategory::where('id', $id)->delete()) {
                return response()->json(['code' => 200], 200);
            } else {
                return response()->json(['code' => 530, 'data' => null, 'message' => 'Error al eliminar'], 530);
            }
        }
    }

    public function categories($commerce_id)
    {
        try {

            $categories = ProductCategory::where('commerce_id', $commerce_id)->get();

            return response()->json(['res' => true, 'categories' => $categories]);
        } catch (\Exception $e) {
            return response()->json(['res' => false, 'error' => $e]);
        }
    }
}
