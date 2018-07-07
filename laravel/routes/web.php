<?php

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
Route::get('/home', 'HomeController@index');

Auth::routes();

Route::auth();
Route::get('logout', '\App\Http\Controllers\Auth\LoginController@logout');

Route::get('admintoko', ['middleware' => ['web', 'auth', 'admintoko'], function() {
	return view('/admintoko', 'AdminTokoController');
}]);

//ADMINTOKO
Route::resource('/admintoko', 'AdminTokoController');
Route::get('/admintoko', function () {
    return view('admintoko.index');
});
Route::resource('/masteruser', 'MasterUserController');
Route::resource('/masterproduk', 'MasterProdukController');

//ADMINTRANSAKSI
Route::resource('/admintransaksi', 'AdminTransaksiController');
Route::get('/admintransaksi', function () {
    return view('admintransaksi.index');
});

//MANAJER
Route::resource('/manajer', 'ManajerController');
Route::get('/manajer', function () {
    return view('manajer.index');
});

//KURIR
Route::resource('/kurir', 'KurirController');
Route::get('/kurir', function () {
    return view('kurir.index');
});
