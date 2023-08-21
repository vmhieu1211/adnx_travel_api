<?php

use Illuminate\Support\Facades\Route;

Route::prefix('api')->middleware('api')->namespace('Modules\Post\src\Http\Controllers')->group(function () {
    Route::prefix('admin')->middleware('auth:admin,api-admin')->name('admin.post.')->group(function () {
        Route::get('/post', 'PostController@index')->name('index');
        Route::post('/post', 'PostController@store')->name('store');
        Route::put('/post/{post}', 'PostController@update')->name('update');
        Route::delete('/post/{post}', 'PostController@delete')->name('delete');
    });
});

Route::prefix('api')->middleware('auth:customer,api-customer')->name('post.')->namespace('Modules\Post\src\Http\Controllers')->group(function () {
    Route::get('/post', function(){
        return 'Customer Post';
    })->name('index');
    Route::post('/post', function(){
        return 'Customer Post';
    })->name('store');
    Route::put('/post/{post}', function(){
        return 'Customer Post';
    })->name('update');
    Route::delete('/post/{post}', function(){
        return 'Customer Post';
    })->name('delete');
});
