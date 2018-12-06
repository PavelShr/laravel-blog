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

Route::middleware('auth:api')->prefix('admin')->group(function () {
    Route::get('logout', 'LoginController@logout');
    Route::get('profile', 'AdminController@getProfile');

    // Resources
    Route::apiResource('articles', 'ArticleController')
        ->except(['show', 'index']);
    Route::apiResource('categories', 'CategoryController')
        ->except(['show', 'index']);
});

Route::apiResource('articles', 'ArticleController')
    ->only(['show', 'index']);
Route::apiResource('categories', 'ArticleController')
    ->only(['show', 'index']);

Route::prefix('auth')->group(function(){
    Route::post('login', 'LoginController@index');
    Route::post('signup', 'SignupController@index');
});