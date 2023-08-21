<?php

use Illuminate\Support\Facades\Route;

Route::prefix('api')->middleware('api')->namespace('Modules\User\src\Http\Controllers')->group(function () {
    Route::prefix('admin')->name('users.')->group(function () {
        Route::get('/user','UserController@index')->name('index');
        Route::post('/user','UserController@store')->name('store');
        Route::put('/user/{user}','UserController@update')->name('update');
        Route::delete('/user/{user}','UserController@delete')->name('delete');
    });
});

