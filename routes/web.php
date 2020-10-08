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

Auth::routes(['register'=>false]);
Route::get('/admin', 'HomeController@index')->name('home');

Route::prefix('admin')->middleware(['auth'])->group(function () {
        // Matches The "/admin/users" URL
        Route::get('news', 'NewsController@index');
        Route::get('news/create', 'NewsController@create');
        Route::POST('news/store', 'NewsController@store');
        Route::get('news/edit/{news_id}', 'NewsController@edit');
        Route::POST('news/update/{news_id}', 'NewsController@update');
        Route::get('news/destroy/{news_id}', 'NewsController@destroy');
});
