<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;



// admin login/logout
Route::prefix('api')->namespace('Modules\Auth\src\Http\Controllers')->group(function () {
    Route::prefix('admin')->name('admin.')->group(function () {
        Route::post('/login', 'AdminAuthController@login')->name('login');
        Route::post('/logout', 'AdminAuthController@logout')->name('logout');
    });
});

Route::prefix('api/admin')->middleware('auth:admin,api-admin')->get('/user-login', function (Request $request) {
    return $request->user();
});

// Customer login/logout
Route::prefix('api')->namespace('Modules\Auth\src\Http\Controllers')->group(function () {
    Route::post('/login', 'CustomerAuthController@login')->name('login');
    Route::post('/logout', 'CustomerAuthController@logout')->name('logout');
});

Route::prefix('api')->middleware('auth:customer,api-customer')->get('/user-login', function (Request $request) {
    return $request->user();
});
