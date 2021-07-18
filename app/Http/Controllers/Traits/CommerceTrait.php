<?php

namespace App\Http\Controllers\Traits;

use App\Commerce;
use App\CommerceType;
use Exception;

trait CommerceTrait
{
    public function commerceTypes()
    {
        try {
            $commerce_types = CommerceType::where('state', 1)->get(['id', 'name']);

            return response()->json(['code' => 200, 'status' => 'success', 'message' => 'commerce_types', 'data' => $commerce_types]);
        } catch (Exception $e) {
            return response()->json(['code' => 500, 'status' => 'error', 'message' => $e->getMessage(), 'data' => null]);
        }
    }

    public function commerces($request)
    {
        try {
            $commerces = Commerce::type($request->type)->city($request->city)->with('getUser')->get();

            return response()->json(['code' => 200, 'status' => 'success', 'message' => 'commerces', 'data' => $commerces]);
        } catch (Exception $e) {
            return response()->json(['code' => 500, 'status' => 'error', 'message' => $e->getMessage(), 'data' => null]);
        }
    }
}
