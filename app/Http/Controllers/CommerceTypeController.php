<?php

namespace App\Http\Controllers;

use App\Commerce;
use App\CommerceType;
use App\Order;
use App\Product;
use App\ProductCategory;
use Illuminate\Http\Request;

class CommerceTypeController extends Controller
{
    public function index()
    {
        $commerceTypes = CommerceType::name(request('name'))->state(request('state'))->paginate(10);

        return view('CommerceType.index', compact('commerceTypes'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required|string',
            'typeImg' => 'nullable|image|mimes:jpg,jpeg,png|max:200000',
        ]);

        $type_img =  null;

        if (request('typeImg')) {
            $type_img = request('typeImg')->store('typeImg', 'public');
        }

        CommerceType::create([
            'name' => $request->name,
            'type_img' => $type_img
        ]);

        return back()->with('status', __('Commerce Type created successfully'));
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
            'typeImg' => 'nullable|image|mimes:jpg,jpeg,png|max:200000',
            'state' => 'required',
        ]);



        $commerceType = CommerceType::where('id', $id)->first();

        if (request('typeImg')) {
            $commerceType->type_img = request('typeImg')->store('typeImg', 'public');
        }

        $commerceType->name = $request->name;
        $commerceType->state = $request->state;
        $commerceType->update();

        return back()->with('status', __('Commerce Type updated successfully'));
    }

    public function destroy($id)
    {
        $commerces = Commerce::where('type', $id)->get();
        foreach ($commerces as $commerce) {
            Order::where('commerce_id', $commerce->id)->delete();
            Product::where('commerce_id', $commerce->id)->delete();
            ProductCategory::where('commerce_id', $commerce->id)->delete();
            $commerce->delete();
        }

        if (CommerceType::where('id', $id)->delete()) {
            return response()->json(['code' => 200], 200);
        } else {
            return response()->json(['code' => 530, 'data' => null, 'message' => 'Error al eliminar'], 530);
        }
    }
}
