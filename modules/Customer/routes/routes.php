<?php

use Illuminate\Support\Facades\Route;

Route::prefix('api')->middleware('api')->namespace('Modules\Customer\src\Http\Controllers')->group(function () {
    Route::prefix('admin')->name('admin.customers.')->group(function () {
        Route::get('/customer','CustomerController@index')->name('index');
        Route::post('/customer','CustomerController@store')->name('store');
        Route::put('/customer/{customer}','CustomerController@update')->name('update');
        Route::delete('/customer/{customer}','CustomerController@delete')->name('delete');
    });
});

