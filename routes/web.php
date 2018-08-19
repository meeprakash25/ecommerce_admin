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
use App\Category;
use App\Product;
use App\Order;
use Illuminate\Foundation\Auth\User;

Auth::routes();
//
//
// Route::get('/dashboard',['middleware' => 'auth', function () {
//     return view('dashboard');
// }]);

Route::group(['middleware' => 'auth'], function () {

    Route::get('/', 'DashboardController@index')->name('/');

    Route::get('/dashboard', 'DashboardController@index');

    //  CATEGORIES
    // defining custom named routes with views. WITH CONTROLLERS: Route::get('apples', ['as' => 'apples.show', 'uses' => 'TestController@getApples']);
    Route::get('/categories/{id}/confirm-delete', function ($id) {
        $category_name = Category::findOrFail($id)->name;

        return view('category.delete', compact('id', 'category_name'));
    })->name('categories.confirm-delete'); // named routing with parameter

    Route::post('/categories/search', 'CategoryController@search');
    // Route::resource('photos', 'PhotoController');

    // PRODUCTS
    Route::get('/products/{id}/confirm-delete', function ($id) {
        $product_name = Product::findOrFail($id)->name;

        return view('product.delete', compact('id', 'product_name'));
    })->name('products.confirm-delete'); // named routing with parameter has closure

    Route::get('/products/{id}/add-image', 'ProductController@addImage')->name('products.add-image'); // named routing with parameter

    Route::post('/products/{id}/add-image', 'ProductController@saveImage')->name('products.add-image'); // it can also be defined as follows
    // Route::post('/products/{id}/add-image', ['as' => 'products.add-image', 'uses' => 'ProductController@saveImage']);

    Route::post('/products/search', 'ProductController@search');

    // ORDERS
    Route::post('/orders/search', 'OrderController@search');

    Route::get('/orders/{id}/confirm-delete', function ($id) {
        $order = Order::findOrFail($id);
        $name = $order->name;
        $email = $order->email;
        return view('order.delete', compact('id', 'name','email'));
    })->name('orders.confirm-delete');


    // USERS
    Route::post('/users/search', 'UserController@search');

    Route::get('/users/{id}/confirm-delete', function ($id) {
        $user_name = User::findOrFail($id)->name;
        return view('auth.user.delete', compact('id', 'user_name'));
    })->name('users.confirm-delete');

    Route::get('/users/{id}/change-password', 'UserController@changePassword')->name('users.change-password');

    Route::post('/users/{id}/change-password', 'UserController@updatePassword')->name('users.change-password');

    Route::get('/users/{id}/add-image', 'UserController@addImage')->name('users.add-image');

    Route::post('/users/{id}/add-image', 'UserController@saveImage')->name('users.add-image');

    Route::get('/users/{id}/profile', 'UserController@profile')->name('users.profile');


    Route::resources([
        'orders'     => 'OrderController',
        'categories' => 'CategoryController',
        'products'   => 'ProductController',
        'settings'   => 'SettingController',
        'users'      => 'UserController',
    ]);
});
