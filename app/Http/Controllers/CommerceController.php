<?php

namespace App\Http\Controllers;

use App\Commerce;
use App\CommerceType;
use App\ProductCategory;
use App\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class CommerceController extends Controller
{
    public function index()
    {
        $commerces = Commerce::name(request()->name)->type(request()->type)->state(request()->state)->get();

        return view('Commerce.index', compact('commerces'));
    }

    public function edit($id)
    {
        $commerce = Commerce::where('id', $id)->first();

        return view('Commerce.edit', compact('commerce'));
    }

    public function update(Request $request, $commerce_id)
    {
        $request->validate([
            'name' => 'required|string',
            'lastName' => 'required|string',
            'email' => 'required|email',
            'docType' => 'required|exists:parameter_value,id',
            'docNum' => 'required',
            'city' => 'required|exists:city,id',
            'address' => 'required|string|max:255',
            'nit' => 'required',
            'commerceName' => 'required|string|max:255',
            // 'commerceType' => 'required|exists:commerce_type,id',
            'description' => 'required|string|max:255',
            'state' => 'required',
        ]);

        $commerce = Commerce::where('id', $commerce_id)->first();

        $commerce->nit = $request->nit;
        $commerce->name = $request->commerceName;
        // $commerce->type = $request->commerceType;
        $commerce->description = $request->description;
        $commerce->state = $request->state;
        $commerce->update();

        $user = User::where('id', $commerce->user_id)->first();

        $user->name = $request->name;
        $user->lastName = $request->lastName;
        $user->email = $request->email;
        $user->docType = $request->docType;
        $user->docNum = $request->docNum;
        $user->city_id = $request->city;
        $user->address = $request->address;

        if (!empty($request->password)) {
            $request->validate([
                'password' => ['required', 'string', 'min:6', 'confirmed'],
            ]);
            $user->password = $request->password;
        }

        $user->update();

        return back()->with('status', __('Commerce updated successfully'));
    }

    public function destroy($id)
    {
        ProductCategory::where('commerce_id', $id)->delete();

        if (Commerce::where('id', $id)->delete()) {
            return response()->json(['code' => 200], 200);
        } else {
            return response()->json(['code' => 530, 'data' => null, 'message' => 'Error al eliminar'], 530);
        }
    }
}
