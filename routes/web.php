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

// Route::get('/', function () {
//     return view('welcome');
// });

Auth::routes();

Route::group(['middleware' => ['auth','menu']], function () {
    // LOCK SCREEN
    Route::namespace('Auth')->group(function () {

        Route::get('administrator/lock-screen','LockScreenController@index');

    });
    // HOME
    Route::namespace('_Administrator\Dashboard')->group(function () {

        Route::get('administrator/home','HomeController@index');

    });
    // USER
    Route::namespace('_Administrator\User')->group(function () {

        Route::get('administrator/users/all/source','UserController@source');
        Route::resource('administrator/users/all','UserController');

        Route::get('administrator/role/users/source','RoleController@source');
        Route::resource('administrator/role/users','RoleController');

        Route::get('administrator/permission/users/source','PermissionController@source');
        Route::resource('administrator/permission/users','PermissionController');

    });
    // MANAGEMENT
    Route::namespace('_Administrator\Management')->group(function () {

        Route::get('administrator/management/category/source','CategoryController@source');
        Route::resource('administrator/management/category','CategoryController');

        Route::get('administrator/management/tag/source','TagController@source');
        Route::resource('administrator/management/tag','TagController');

        Route::get('administrator/management/post/source','PostController@source');
        Route::get('administrator/management/post/create/categories','PostController@categories');
        Route::resource('administrator/management/post','PostController');

    });
    // SETTING
    Route::namespace('_Administrator\Setting')->group(function () {

        Route::resource('administrator/settings/general','GeneralController');

    });
    // MEDIA
    Route::namespace('_Administrator\Media')->group(function () {

        Route::get('administrator/medias','MediaController@index');

    });
    // COMMENT
    Route::namespace('_Administrator\Comment')->group(function () {

        Route::get('administrator/comments','CommentController@index');

    });

});

// FRONTEND
Route::namespace('_Public')->group(function () {

    Route::get('/','HomeController@index');

    Route::get('/blog/{slug}','BlogController@index');

    Route::get('/tags/{slug}','TagsController@index');

    Route::get('/categories/{slug}','CategoriesController@index');

    Route::get('{page}','PageController@index');

});
