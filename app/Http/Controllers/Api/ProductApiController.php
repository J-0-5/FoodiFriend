<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Traits\ProductTrait;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class ProductApiController extends Controller
{
    use ProductTrait;

    public function getProducts(Request $request)
    {
        return $this->products($request);
    }
}
