<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

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

// Route::middleware('auth:api')->get('/user', function (Request $request) {
//     return $request->user();
// });

Route::name('api.')->group(function()
{
    // Route::('/products','Api\ProductsApi');
    Route::get('/products/motors','Api\ProductsApi@getMotors');
    Route::get('/products/cars','Api\ProductsApi@getCars');
    Route::post('/products/search','Api\ProductsApi@postSearch');
    Route::get('/products/recomend/{id}','Api\ProductsApi@getRecomend');
    Route::apiResource('/products','Api\ProductsApi');
    Route::post('/admin/login','Api\AdminApi@login')->name('admin.login');
});