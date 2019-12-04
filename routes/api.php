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

Route::group(['prefix' => 'users'], function() {
    Route::get('/all', 'Api\UserController@getAll');
    Route::post('/save', 'Api\UserController@saveRecord');
    Route::post('/delete', 'Api\UserController@deleteRecord');
});

Route::group(['prefix' => 'setting'], function() {
    Route::get('/all', 'Api\settingsController@allSettings');
    Route::post('/save', 'Api\settingsController@saveSettings');
});

Route::group(['prefix' => 'pages'], function() {
    Route::get('/all', 'Api\pageManagementController@getAll');
    Route::post('/save', 'Api\pageManagementController@saveRecord');
    Route::post('/delete', 'Api\pageManagementController@deleteRecord');
    
});

Route::group(['prefix' => 'files'], function() {
    Route::get('/all', 'Api\fileController@getAllFiles');
    Route::post('/save', 'Api\fileController@addFile');
    Route::post('/delete', 'Api\fileController@deleteFile');
});

Route::group(['prefix' => 'menu'], function() {
    Route::get('/all', 'Api\mainMenuController@getAll');
    Route::post('/save', 'Api\mainMenuController@saveRecord');
    Route::post('/delete', 'Api\mainMenuController@deleteRecord');
});

Route::group(['prefix' => 'blog'], function() {
    Route::get('/all', 'Api\blogController@getAll');
    Route::post('/save', 'Api\blogController@saveRecord');
    Route::post('/delete', 'Api\blogController@deleteRecord');
});

Route::group(['prefix' => 'interest'], function() {
    Route::get('/all', 'Api\interestCheckController@getAll');
    Route::post('/save', 'Api\interestCheckController@saveRecord');
    Route::post('/delete', 'Api\interestCheckController@deleteRecord');
});

Route::group(['prefix' => 'roles'], function() {
    Route::get('/all', 'Api\userRoleController@getAll');
    Route::post('/save', 'Api\userRoleController@saveRecord');
    Route::post('/delete', 'Api\userRoleController@deleteRecord');
});

Route::group(['prefix' => 'notifications'], function() {
    Route::get('/all', 'Api\notificationsController@getAll');
    Route::get('/allGeneral', 'Api\notificationsController@getAllGeneral');
    Route::get('/allUser', 'Api\notificationsController@getAllUser');
    Route::post('/setRead', 'Api\notificationsController@setRead');
    Route::post('/save', 'Api\notificationsController@saveRecord');
    Route::post('/delete', 'Api\notificationsController@deleteRecord');
});

Route::group(['prefix' => 'mail'], function() {
    Route::post('/contact', 'Api\MailController@sendContact');
});