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

Route::get('/', function () {
    return view('index');
});

Route::middleware('auth:web')->group(function() {
    Route::get('/admin-panel', function () {
        return view('admin-panel');
    });
});

Route::redirect('auth', '/auth/sign-in', 301);

Route::prefix('auth')->group(function() {
    Route::get('sign-in', function () {
        return view('auth');
    });

    Route::get('sign-up', function () {
        return view('auth');
    });
});
