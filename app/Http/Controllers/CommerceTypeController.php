<?php

namespace App\Http\Controllers;

use App\Commerce;
use App\CommerceType;
use Illuminate\Http\Request;

class CommerceTypeController extends Controller
{
    public function index()
    {
        $commerceTypes = CommerceType::name(request('name'))->state(request('state'))->get();

        return view('CommerceType.index', compact('commerceTypes'));
    }

    public function edit($id)
    {
        $commerceType = CommerceType::where('id', $id)->first();

        if (!empty($commerceType)) {
            return response()->json(['code' => 200, 'data' => $commerceType], 200);
        } else {
            return response()->json(['code' => 404, 'data' => null, 'message' => 'Tipo de comercio no encontrado'], 404);
        }
    }

    public function update()
    {
        return;
    }

    public function destroy($id)
    {
        Commerce::where('type', $id)->delete();

        if (CommerceType::where('id', $id)->delete()) {
            return response()->json(['code' => 200], 200);
        } else {
            return response()->json(['code' => 530, 'data' => null, 'message' => 'Error al eliminar'], 530);
        }
    }
}
