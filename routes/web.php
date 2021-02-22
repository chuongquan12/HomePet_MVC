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


// ---------Personnel
Route::get('list-personnel', 'PersonnelController@index');

// Add

Route::get('add-personnel', 'PersonnelController@add');
Route::post('save-personnel', 'PersonnelController@create');

// Edit

Route::get('edit-personnel/{idNV}', 'PersonnelController@show');
Route::post('update-personnel', 'PersonnelController@update');

// Delete 
Route::get('delete-personnel/{idNV}', 'PersonnelController@destroy');

// ----------Product Type 1
Route::get('list-type-1', 'Type1Controller@index');

// Add

Route::get('add-type-1', 'Type1Controller@add');
Route::post('save-type-1', 'Type1Controller@create');

// Edit

Route::get('edit-type-1/{idTC}', 'Type1Controller@show');
Route::post('update-type-1', 'Type1Controller@update');

// Delete 
Route::get('delete-type-1/{idTC}', 'Type1Controller@destroy');

// ----------Product Type 2
Route::get('list-type-2', 'Type2Controller@index');

// Add

Route::get('add-type-2', 'Type2Controller@add');
Route::post('save-type-2', 'Type2Controller@create');

// Edit

Route::get('edit-type-2/{idNhom}', 'Type2Controller@show');
Route::post('update-type-2', 'Type2Controller@update');

// Delete 
Route::get('delete-type-2/{idNhom}', 'Type2Controller@destroy');
