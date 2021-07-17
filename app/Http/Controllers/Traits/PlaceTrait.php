<?php

namespace App\Http\Controllers\Traits;

use App\City;
use App\Department;

trait PlaceTrait
{
    public function departments()
    {
        $departments = Department::get();
        return response()->json(['code' => 200, 'status' => 'success', 'message' => 'deparments', 'data' => $departments]);
    }

    public function cities($department_id)
    {
        $departments = City::where('department_id', $department_id)->get();
        return response()->json(['code' => 200, 'status' => 'success', 'message' => 'cities', 'data' => $departments]);
    }
}
