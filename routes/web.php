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

// Route::get('/index', function () {
//     return view('welcome');
// });


Route::get('/', 'FrontController@index');
Route::get('/news', 'FrontController@news');
Route::get('/news_info/{news_id}', 'FrontController@news_info');
Route::get('/contact_us', 'FrontController@contact_us');
Route::post('/contact_product', 'FrontController@contact_product');

Route::get('/products', 'FrontController@products');

Auth::routes(['register'=>false]);
// Auth::routes();
Route::get('/admin', 'HomeController@index')->name('home');

Route::prefix('admin')->middleware(['auth'])->group(function () {
        // News
        Route::get('news', 'NewsController@index');
        Route::get('news/create', 'NewsController@create');
        Route::POST('news/store', 'NewsController@store');
        Route::get('news/edit/{news_id}', 'NewsController@edit');
        Route::POST('news/update/{news_id}', 'NewsController@update');
        Route::get('news/destroy/{news_id}', 'NewsController@destroy');
        //Products
        Route::get('products', 'ProductsController@index');
        Route::get('products/create', 'ProductsController@create');
        Route::POST('products/store', 'ProductsController@store');
        Route::get('products/edit/{products_id}', 'ProductsController@edit');
        Route::POST('products/update/{products_id}', 'ProductsController@update');
        Route::get('products/destroy/{products_id}', 'ProductsController@destroy');
});
