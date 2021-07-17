<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

Route::middleware('auth:api')->get('/user', function (Request $request) {
    return $request->user();
});

Route::get('getDepartments', 'Api\PlaceApiController@getDepartments');
Route::get('getCities', 'Api\PlaceApiController@getCities');

Route::post('register', 'Api\UserApiController@signUp');
Route::post('login', 'Api\UserApiController@signIn');

//logged in
Route::middleware(['auth:sanctum'])->group(function () {
    Route::post('logout', 'Api\UserApiController@signOut');
});
