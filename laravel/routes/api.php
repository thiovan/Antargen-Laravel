<?php

use Illuminate\Http\Request;

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

//API LOGIN
Route::get('user', 'UserController@users');
Route::post('auth/login', 'AuthController@login');

//API PRODUK
Route::get('produk', 'ProdukController@index');
Route::get('produk/{id}', 'ProdukController@show');
Route::post('produk', 'ProdukController@store');
Route::put('produk/{id}', 'ProdukController@update');
Route::delete('produk/{id}', 'ProdukController@destroy');
Route::get('makanan', 'ProdukController@makanan');
Route::get('minuman', 'ProdukController@minuman');
Route::get('kesehatan', 'ProdukController@kesehatan');
Route::get('krt', 'ProdukController@krt');
Route::post('pesanan', 'PesananController@store');
Route::get('kurir', 'UserController@getAllKurir');

//Route::resource('produk', 'ProdukController');

//API USER
// Route::get('user', 'UserController@index');
// Route::get('user/{id}', 'UserController@show');
// Route::post('user', 'UserController@store');
// Route::put('user/{id}', 'UserController@update');
// Route::delete('user/{id}', 'UserController@destroy');

//Route::resource('user', 'UserController');

