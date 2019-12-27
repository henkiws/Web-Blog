<?php

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', function () {
    return view('welcome');
});

Auth::routes();

Route::group(['middleware' => ['auth','menu']], function () {
    // Home
    Route::namespace('_Administrator\Dashboard')->group(function () {

        Route::get('administrator/home','HomeController@index');

    });
    // User
    Route::namespace('_Administrator\User')->group(function () {

        Route::get('administrator/users/all/source','UserController@source');
        Route::resource('administrator/users/all','UserController');

        Route::get('administrator/role/users/source','RoleController@source');
        Route::resource('administrator/role/users','RoleController');

        Route::get('administrator/permission/users/source','PermissionController@source');
        Route::resource('administrator/permission/users','PermissionController');

    });
    // Management
    Route::namespace('_Administrator\Management')->group(function () {

        Route::get('administrator/management/category/source','CategoryController@source');
        Route::resource('administrator/management/category','CategoryController');

        Route::get('administrator/management/tag/source','TagController@source');
        Route::resource('administrator/management/tag','TagController');

        Route::get('administrator/management/post/source','PostController@source');
        Route::resource('administrator/management/post','PostController');

    });

});
