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


    Route::prefix('auth')->group(function () {
        Route::post('login', 'App\Http\Controllers\AuthController@login');
        Route::post('register', 'App\Http\Controllers\AuthController@register');
        Route::post('refresh', 'App\Http\Controllers\AuthController@refresh');
    });

    Route::group(['middleware' => ['jwt.authMdd']], function() {

        Route::post('me', 'App\Http\Controllers\AuthController@me');
        Route::post('logout', 'App\Http\Controllers\AuthController@logout');

        Route::prefix('invoice')->group(function () {
            Route::get('all', 'App\Http\Controllers\InvoiceController@index');
            Route::get('view/{id}', 'App\Http\Controllers\InvoiceController@show');
            Route::post('add', 'App\Http\Controllers\InvoiceController@store');
            Route::put('edit/{id}', 'App\Http\Controllers\InvoiceController@update');
            Route::delete('delete/{id}', 'App\Http\Controllers\InvoiceController@destroy');
        });
        
    });

