<?php

namespace App\Http\Controllers\Traits;

use App\User;
use Exception;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;

trait UserTrait
{

    public function register($request)
    {
        $result = DB::transaction(function () use ($request) {
            try {
                $validator = Validator::make($request->all(), [
                    'name' => ['required', 'string', 'max:255'],
                    'lastName' => ['required', 'string', 'max:255'],
                    'docType' => ['required', 'exists:parameter_value,id'],
                    'docNum' => ['required', 'unique:users,docNum'],
                    'city' => ['required', 'exists:city,id'],
                    'address' => ['required', 'string', 'max:255'],
                    'email' => ['required', 'string', 'email', 'max:255', 'unique:users'],
                    'password' => ['required', 'string', 'min:6', 'confirmed'],
                ]);

                if ($validator->fails()) {
                    return response()->json(['code' => 406, 'status' => 'error', 'message' => $validator->errors()->first(), 'data' => null]);
                }

                $user = User::create([
                    'name' => $request['name'],
                    'lastName' => $request['lastName'],
                    'docType' => $request['docType'],
                    'docNum' => $request['docNum'],
                    'city_id' => $request['city'],
                    'address' => $request['address'],
                    'email' => $request['email'],
                    'password' => Hash::make($request['password']),
                ]);

                if ($user) {
                    return response()->json(['code' => 201, 'status' => 'success', 'message' => 'successfully registered user', 'data' => null]);
                }
            } catch (Exception $e) {
                return response()->json(['code' => 500, 'status' => 'error', 'message' => $e->getMessage(), 'data' => null]);
            }
        });
        return $result;
    }

    public function login($request)
    {
        try {
            $validator = Validator::make($request->all(), [
                'email' => ['required', 'string', 'email', 'max:255'],
                'password' => ['required', 'string', 'min:6'],
            ]);

            if ($validator->fails()) {
                return response()->json(['code' => 406, 'status' => 'error', 'message' => $validator->errors(), 'data' => null]);
            }

            $credentials = request(['email', 'password']);
            if (!Auth::attempt($credentials)) {
                return response()->json(['code' => 401, 'status' => 'error', 'message' => 'Unauthorized. Incorrect email or password', 'data' => null]);
            }

            $user = User::where('email', $request->email)->first();

            if (!Hash::check($request->password, $user->password, [])) {
                throw new \Exception('login error');
            }

            $token = $user->createToken('authToken')->plainTextToken;

            return response()->json(['code' => 200, 'status' => 'success', 'message' => 'logged in', 'data' => $token]);
        } catch (Exception $e) {
            return response()->json(['code' => 500, 'status' => 'error', 'message' => $e->getMessage(), 'data' => null]);
        }
    }
}
