<?php

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

// FrontEnd

Route::get('/', 'HomeController@index');

Route::get('/home', 'HomeController@index');

Route::get('/cart', 'CartController@index');

Route::get('/order', 'OrderController@index');

Route::get('/product', 'ProductController@index');

Route::get('/store', 'StoreController@index');

Route::get('/user', 'UserController@index');

//BackEnd Admin

Route::get('/admin', 'AdminController@index');

Route::get('list-order', 'ListOrderController@index');


// Personnel
Route::get('list-personnel', 'PersonnelController@index');

// Add

Route::get('add-personnel', 'PersonnelController@add');
Route::post('save-personnel', 'PersonnelController@create');

// Edit

Route::get('edit-personnel/{idNV}', 'PersonnelController@show');
Route::post('update-personnel', 'PersonnelController@update');

// Delete 
Route::get('delete-personnel/{idNV}', 'PersonnelController@destroy');
