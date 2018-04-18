<?php

/*
|--------------------------------------------------------------------------
| Service - API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register all of the routes for this service.
| It's a breeze. Simply tell Laravel the URIs it should respond to
| and give it the controller to call when that URI is requested.
|
*/

// Prefix: /api
Route::group(['prefix' => 'api'], function() {

    // Prefix: /v1
    Route::group(['prefix' => 'v1', 'middleware' => ['auth:api']], function() {

        // The controllers live in src/Services/Api/Http/Controllers

        Route::get('/users', 'UserController@index')
            ->name('users');

        Route::put('/users/{id}', 'UserController@update')
            ->where('id', '[0-9]+')
            // ->middleware('can:update, Framework\User')
            ->name('user');

        Route::put('/profiles/{id}', 'ProfileController@update')
            ->where('id', '[0-9]+')
            ->name('profile');

        Route::post('/teams', 'TeamController@store')
            ->name('teams');

        Route::get('/competitions', 'CompetitionController@index')
            ->name('competitions');

        Route::post('/competitions', 'CompetitionController@store')
            ->name('competitions');

        Route::post('/leaderboards', 'LeaderboardController@store')
            ->name('leaderboards');
    });

});
