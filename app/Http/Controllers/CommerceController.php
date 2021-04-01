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
        $commerceTypes = CommerceType::where('state', 1)->get();

        if (Auth::user()->id == 1) {
            $commerces = Commerce::state(request()->state)->get();
        } else {
            $commerces = Commerce::where('id', Auth::user()->id)->get();
        }

        return view('Commerce.index', compact('commerceTypes', 'commerces'));
    }
}
