<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Traits\CommerceTrait;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class CommerceApiController extends Controller
{
    use CommerceTrait;

    public function getCommerceTypes()
    {
        return $this->commerceTypes();
    }

    public function getCommerces(Request $request)
    {
        return $this->commerces($request);
    }

    public function getCommerce(Request $request)
    {
        return $this->commerce($request);
    }
}
