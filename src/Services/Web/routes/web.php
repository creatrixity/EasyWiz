<?php

/*
|--------------------------------------------------------------------------
| Service - Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register all of the routes for this service.
| It's a breeze. Simply tell Laravel the URIs it should respond to
| and give it the controller to call when that URI is requested.
|
*/

Route::group(['prefix' => ''], function() {

    // The controllers live in src/Services/Web/Http/Controllers
    // Route::get('/', 'UserController@index');

    Route::get('/', function() {
        return view('web::welcome');
    });

    Route::get('/wizard', function () {
      return view('pages.wizard.index');
    });

    Route::get('/wizard/{catchall?}', function () {
        return view('pages.wizard.index');
    })->where('catchall', '(.*)');

});
