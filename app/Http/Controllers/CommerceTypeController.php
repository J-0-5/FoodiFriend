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

    public function update(Request $request, $id)
    {
        $request->validate([
            'name' => 'required|string',
            'state' => 'required',
        ]);

        $commerceType = CommerceType::where('id', $id)->first();

        $commerceType->name = $request->name;
        $commerceType->state = $request->state;
        $commerceType->update();

        return back()->with('status', __('Commerce Type updated successfully'));
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
