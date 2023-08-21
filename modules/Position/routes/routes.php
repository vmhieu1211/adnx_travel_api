<?php

use Illuminate\Support\Facades\Route;

Route::prefix('api')->middleware('api')->namespace('Modules\Position\src\Http\Controllers')->group(function () {
    Route::prefix('admin')->name('positions.')->group(function () {
        Route::get('/position','PositionController@index')->name('index');
        Route::post('/position','PositionController@store')->name('store');
        Route::put('/position/{position}','PositionController@update')->name('update');
        Route::delete('/position/{position}','PositionController@delete')->name('delete');
    });
});

