<?php

use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', function () {
    return view('welcome');
});

Route::group(['middleware' => 'auth'], function () {

    Route::resource('/commerceType', 'CommerceTypeController');

    Route::resource('/commerce', 'CommerceController');

    Route::resource('/productCategory', 'ProductCategoryController');
    Route::get('/productCategory/categories/{commerce}', 'ProductCategoryController@categories');

    Route::resource('/product', 'ProductController');

    Route::get('/home', 'HomeController@index')->name('home');

    Route::get('/commerces/{type}', 'HomeController@commerces')->name('home.commerces');

    Route::get('/products/{commerce_id}', 'HomeController@products')->name('home.products');

});

Auth::routes();


Route::resource('/cities', 'CityController');
