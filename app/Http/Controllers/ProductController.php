<?php

namespace App\Http\Controllers;

use App\Commerce;
use App\Exports\ProductsExport;
use App\Product;
use App\ProductCategory;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Maatwebsite\Excel\Facades\Excel;

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
            ->paginate(10);

        return view('product.index', compact('commerces', 'productCategories', 'products'));
    }

    public function create()
    {

        $id = Auth::user()->id;

        $commerces = Commerce::where('state', 1)->get();

        $productCategories = ProductCategory::get();

        if ($id != 1) {
            $productCategories = $productCategories->where('commerce_id', Auth::user()->getCommerce->id);
        }

        return view('product.create', compact('commerces', 'productCategories'));
    }

    public function store(Request $request)
    {

        $request->validate([
            'name' => 'required|string',
            'description' => 'required|string',
            'price' => 'required|numeric',
            'quantity' => 'required|numeric',
            'commerce_id' => 'required|exists:commerce,id',
            'category' => 'required|exists:product_category,id',
            'productImg' => 'nullable|image|mimes:jpg,jpeg,png|max:200000',
        ]);

        $product_img =  null;

        if (request('productImg')) {
            $product_img = request('productImg')->store('productImg', 'public');
        }

        Product::create([
            'product_img' => $product_img,
            'name' => request('name'),
            'description' => request('description'),
            'price' => request('price'),
            'quantity' => 1,
            'commerce_id' => request('commerce_id'),
            'category_id' => request('category'),
        ]);

        return back()->with('status', __('Product created successfully'));
    }

    public function edit($id)
    {

        $commerces = Commerce::where('state', 1)->get();

        $product = Product::where('id', $id)->first();

        $productCategories = ProductCategory::where('commerce_id', $product->commerce_id)->get();

        return view('product.edit', compact('commerces', 'product', 'productCategories'));
    }

    public function update(Request $request, $id)
    {
        $request->validate([
            'name' => 'required|string',
            'description' => 'required|string',
            'price' => 'required|numeric',
            'quantity' => 'required|numeric',
            'commerce_id' => 'required|exists:commerce,id',
            'category' => 'required|exists:product_category,id',
            'productImg' => 'nullable|image|mimes:jpg,jpeg,png|max:200000',
        ]);

        $product = Product::where('id', $id)->first();

        $product->name = request('name');
        $product->description = request('description');
        $product->price = request('price');
        $product->quantity = 1;
        $product->commerce_id = request('commerce_id');
        $product->category_id = request('category');
        $product->state = request('state');

        if (request('productImg') != null) {
            $product->product_img = request('productImg')->store('productImg', 'public');
        }

        $product->update();

        return back()->with('status', __('Product updated successfully'));
    }

    public function destroy($id)
    {

        if (Product::where('id', $id)->delete()) {
            return response()->json(['code' => 200], 200);
        } else {
            return response()->json(['code' => 530, 'data' => null, 'message' => 'Error al eliminar'], 530);
        }
    }

    public function export(){
        return Excel::download(new ProductsExport, 'products.xlsx');
    }
}
