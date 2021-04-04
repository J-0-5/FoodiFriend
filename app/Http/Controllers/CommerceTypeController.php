<?php

namespace App\Http\Controllers;

use App\CommerceType;
use Illuminate\Http\Request;

class CommerceTypeController extends Controller
{
    public function index()
    {
        $commerceType = CommerceType::name(request('name'))->state(request('state'))->get();

        return view('CommerceType.index', compact('commerces'));
    }
}
