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
//
// Route::get('/',['middleware' => 'auth', function () {
//     return view('dashboard');
// }]);
//
Auth::routes();
//
//
// Route::get('/dashboard',['middleware' => 'auth', function () {
//     return view('dashboard');
// }]);

Route::group(['middleware' => 'auth'], function () {
});

Route::get('/', 'DashboardController@index')->name('/');

Route::get('/dashboard', 'DashboardController@index');

Route::resources([
    'orders'     => 'OrderController',
    'categories' => 'CategoryController',
    'products'   => 'ProductController',
    'settings'   => 'UserController',
    'users'      => 'UserController',
]);

//defining custom named routes with views. WITH CONTROLLERS: Route::get('apples', ['as' => 'apples.show', 'uses' => 'TestController@getApples']);
Route::get('/categories/{id}/confirm-delete', function ($id) {
    return view('category.delete', compact('id'));
})->name('categories.confirm-delete');

Route::post('/categories', 'CategoryController@search');
// Route::resource('photos', 'PhotoController');
