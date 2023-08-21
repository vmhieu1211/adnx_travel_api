<?php

use Illuminate\Support\Facades\Route;

Route::prefix('api')->middleware('api')->namespace('Modules\Request\src\Http\Controllers')->group(function () {
    Route::prefix('admin')->middleware('api')->name('admin.request.')->group(function () {
        Route::get('/request', 'RequestController@index')->name('index');
        Route::post('/request', 'RequestController@store')->name('store');
        Route::put('/request/{request}', 'RequestController@update')->name('update');
        Route::delete('/request/{request}', 'RequestController@destroy')->name('delete');
    });
});

Route::prefix('api')->middleware('api')->name('request.')->namespace('Modules\Request\src\Http\Controllers')->group(function () {
    Route::get('/request', function () {
        return 'Customer request';
    })->name('index');
    Route::post('/request', function () {
        return 'Customer request';
    })->name('store');
    Route::put('/request/{request}', function () {
        return 'Customer request';
    })->name('update');
    Route::delete('/request/{request}', function () {
        return 'Customer request';
    })->name('delete');
});
