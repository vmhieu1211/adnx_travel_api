<?php

use Illuminate\Support\Facades\Route;

Route::prefix('api')->middleware('api')->namespace('Modules\Department\src\Http\Controllers')->group(function () {
    Route::prefix('admin')->name('departments.')->group(function () {
        Route::get('/department','DepartmentController@index')->name('index');
        Route::post('/department','DepartmentController@store')->name('store');
        Route::put('/department/{department}','DepartmentController@update')->name('update');
        Route::delete('/department/{department}','DepartmentController@delete')->name('delete');
    });
});

