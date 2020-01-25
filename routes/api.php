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

Route::prefix('todo')->group(function() {
    Route::post('getRefresh'      ,'Api\TodoController@getRefresh');
    Route::post('saveProject', 'Api\TodoController@saveProject');
    Route::post('deleteProject', 'Api\TodoController@deleteProject');
    Route::post('saveCategory', 'Api\TodoController@saveCategory');
    Route::post('deleteCategory', 'Api\TodoController@deleteCategory');
    Route::post('saveTask', 'Api\TodoController@saveTask');
    Route::post('deleteTask', 'Api\TodoController@deleteTask');
    Route::post('archiveTask', 'Api\TodoController@archiveTask');
});

Route::prefix('taskCommentary')->group(function() {
    Route::post('getComments', 'Api\taskCommentaryController@getComments');
    Route::post('save', 'Api\taskCommentaryController@save');
});

Route::prefix('store')->group(function() {
    Route::get('/categories/all', 'Api\shopController@allCategories');
    Route::get('/items/all', 'Api\shopController@allItems');
    Route::get('/transactions/all', 'Api\shopController@allTransactions');
    Route::post('/categories/save', 'Api\shopController@saveCategory');
    Route::post('/items/save', 'Api\shopController@saveItem');
    Route::post('/transactions/save', 'Api\shopController@saveTransaction');
    Route::post('/categories/delete', 'Api\shopController@deleteCategory');
    Route::post('/items/delete', 'Api\shopController@deleteItem');
    Route::post('/transactions/delete', 'Api\shopController@deleteTransaction');
    Route::post('/checkout', 'Api\shopController@checkoutOrder');
});