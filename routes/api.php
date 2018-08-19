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

// create new order
Route::post('/order', 'ApiOrderController@store');
//get all category
Route::get('/category', 'ApiCategoryController@index');
// get products by category id
Route::get('/product-by-category/{category_id}', 'ApiProductController@productByCategory');
// get product detail
Route::get('/product/{id}', 'ApiProductController@index');
// get app settings
Route::get('/setting', 'ApiSettingController@index');
