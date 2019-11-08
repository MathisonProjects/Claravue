<?php
use Illuminate\Http\Request;
Route::middleware('auth:api')->get('/user', function (Request $request) {
    return $request->user();
});
Route::group(['middleware' => ['json.response']], function () {
    Route::middleware('auth:api')->get('/user', function (Request $request) {
        return $request->user();
    });
    // public routes
    Route::post('/login', 'Api\AuthController@login')->name('login.api');
    Route::post('/register', 'Api\AuthController@register')->name('register.api');
    // private routes
    Route::middleware('auth:api')->group(function () {
        Route::get('/logout', 'Api\AuthController@logout')->name('logout');
    });
});

Route::group(['prefix' => 'user'], function() {
    Route::get('/count', 'Api\UserController@totalUsers');
	Route::get('/all', 'Api\UserController@allUsers');
});