<?php

namespace App\Http\Controllers\Traits;

use App\Product;
use Exception;

trait ProductTrait
{
    public function products($request)
    {
        try {
            $products = Product::where('state', 1)->where('commerce_id', $request->id)->get();

            return response()->json(['code' => 200, 'status' => 'success', 'message' => 'products', 'data' => $products]);
        } catch (Exception $e) {
            return response()->json(['code' => 500, 'status' => 'error', 'message' => $e->getMessage(), 'data' => null]);
        }
    }
}
