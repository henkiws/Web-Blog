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
    Route::namespace('_Administrator')->group(function () {

        Route::get('administrator/home','HomeController@index');

        Route::get('administrator/users/source','UserController@source');
        Route::resource('administrator/users','UserController');

        Route::get('administrator/role/users/source','RoleController@source');
        Route::resource('administrator/role/users','RoleController');

        Route::get('administrator/permission/users/source','PermissionController@source');
        Route::resource('administrator/permission/users','PermissionController');

    });
});
