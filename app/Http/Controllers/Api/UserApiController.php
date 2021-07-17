<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Traits\UserTrait;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class UserApiController extends Controller
{
    use UserTrait;

    public function signUp(Request $request)
    {
        return $this->register($request);
    }

    public function signIn(Request $request)
    {
        return $this->login($request);
    }
}
