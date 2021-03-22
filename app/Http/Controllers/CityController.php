<?php

namespace App\Http\Controllers;

use App\City;
use Illuminate\Http\Request;

class CityController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        try {

            $department_id = $request->department_id;

            $cities = City::where('department_id', $department_id)->get();

            return response()->json(['res' => true, 'cities' => $cities]);
        } catch (\Exception $e) {
            return response()->json(['res' => false, 'error' => $e]);
        }
    }
}
