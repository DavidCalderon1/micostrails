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

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');

Route::resource('users', 'UserController');

Route::resource('users', 'UserController');

Route::resource('users', 'UserController');

Route::resource('users', 'UserController');

Route::resource('providers', 'ProvidersController');

Route::resource('products', 'ProductsController');

Route::resource('cities', 'CitiesController');

Route::resource('typeVehicles', 'TypeVehicleController');

Route::resource('roles', 'RolesController');

Route::resource('statuses', 'StatusController');

Route::resource('storages', 'StoragesController');

Route::resource('vehicles', 'VehiclesController');