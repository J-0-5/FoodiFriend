<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Traits\PlaceTrait;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class PlaceApiController extends Controller
{
    use PlaceTrait;

    public function getDepartments()
    {
        return $this->departments();
    }

    public function getCities(Request $request)
    {
        $department_id = $request->department_id;
        return $this->cities($department_id);
    }
}
