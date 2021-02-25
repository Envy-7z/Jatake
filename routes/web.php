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

// Route::get('/', function () {
//     return view('welcome');
// });


Route::get('/', 'App\Http\Controllers\HomeController@index')->name('home');
Route::get('/term-condition', 'App\Http\Controllers\HomeController@term_condition')->name('home');
// Route::get('/mobil', 'HomeController@showProductByType');
Route::get('/search', 'App\Http\Controllers\HomeController@search');

Route::prefix('/')->name('home.')->group(function()
{
    Route::prefix('brands')->name('brands.')->group(function(){
        Route::get('{type}', 'App\Http\Controllers\Home\BrandsControl@showBrandByType')->name('type');
        Route::post('create','App\Http\Controllers\Home\BrandsControl@create')->name('create');
    });

    Route::apiResource('brands','App\Http\Controllers\Home\BrandsControl');

    Route::prefix('products')->name('products.')->group(function(){
        Route::get('brand/{brand_id}/{type}', 'App\Http\Controllers\Home\ProductsControl@showProductByBrandAndType')->name('brand.type');
        Route::get('brand/{brand_id}', 'App\Http\Controllers\Home\ProductsControl@showProductByBrand')->name('brand');
        // Route::post('create','Home\ProductsControl@create')->name('create');
        Route::post('store_reviews','App\Http\Controllers\Home\ProductsControl@storeReviews')->name('store-reviews');
    });

    Route::apiResource('products','App\Http\Controllers\Home\ProductsControl');
});

Route::prefix('/extra-pages')->group(function()
{
    Route::get('/{page}','App\Http\Controllers\ExtraPagesController@page')->name("extra");
});


// Route::prefix('/products')->group(function()
// {
//     Route::any('/json/{function}','ProductsController@json');
//     Route::any('/json/{function}/{id}','ProductsController@json');
// });

Route::prefix('/admin')->name('admin.')->group(function()
{
    Route::get('/','App\Http\Controllers\AdminController@index');
    Route::get('login','App\Http\Controllers\AdminController@login')->name('login');
    Route::post('login','App\Http\Controllers\AdminController@request_login')->name('req_login');
    Route::get('logout','App\Http\Controllers\AdminController@logout')->name('logout');


    Route::prefix('products')->name('products.')->group(function(){
        Route::post('create','App\Http\Controllers\Admin\ProductsControl@create')->name('create');
        Route::get('old','App\Http\Controllers\Admin\ProductsControl@old')->name('old');
    });

    Route::apiResource('products','App\Http\Controllers\Admin\ProductsControl');

    Route::prefix('brands')->name('brands.')->group(function(){
        Route::post('create','App\Http\Controllers\Admin\BrandsControl@create')->name('create');
    });

    Route::apiResource('brands','App\Http\Controllers\Admin\BrandsControl');
});

// Route::apiResource('/admin', 'AdminController');
