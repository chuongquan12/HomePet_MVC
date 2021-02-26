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

Route::get('/product', 'ProductDetailController@index');

Route::get('/store', 'StoreController@index');

Route::get('/user', 'UserController@index');

//BackEnd Admin

Route::get('/admin', 'AdminController@index');

// ---------Order  

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

// ----------Trademark
Route::get('list-trademark', 'TrademarkController@index');

// Add

Route::get('add-trademark', 'TrademarkController@add');
Route::post('save-trademark', 'TrademarkController@create');

// Edit

Route::get('edit-trademark/{idTH}', 'TrademarkController@show');
Route::post('update-trademark', 'TrademarkController@update');

// Delete 
Route::get('delete-trademark/{idTH}', 'TrademarkController@destroy');

// ----------Product
Route::get('list-product', 'ProductController@index');

// Add

Route::get('add-product', 'ProductController@add');
Route::post('save-product', 'ProductController@create');

// Edit

Route::get('edit-product/{idTH}', 'ProductController@show');
Route::post('update-product', 'ProductController@update');

// Delete 
Route::get('delete-product/{idTH}', 'ProductController@destroy');

// ----------IMAGE
Route::get('list-slide', 'ImageController@index');

// Upload SlideShow

Route::get('upload-slide', 'ImageController@add');
Route::post('save-image-slide', 'ImageController@create');

// Delete 
Route::get('delete-image/{idTH}', 'ImageController@destroy');
