<?php

namespace App\Http\Controllers;

use App\Commerce;
use App\CommerceType;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class CommerceController extends Controller
{
    public function index()
    {
        $commerces = Commerce::state(request()->state)->get();

        return view('Commerce.index', compact('commerces'));
    }

    public function edit($id)
    {
        $commerce = Commerce::where('id', $id)->first();

        return view('Commerce.edit', compact('commerce'));
    }

    public function update($commerce_id)
    {
        return $commerce_id;
    }
}
