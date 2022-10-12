<?php

use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Panel Routes
|--------------------------------------------------------------------------
|
| Here is where you can register panel routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "panel" middleware group. Now create something great!
|
*/

Route::get('home', 'HomeController@dashboard')->name('home');

/** Banners */
Route::group(['as' => 'banners.', 'namespace' => 'Banner', 'prefix' => 'banners'], function () {

    Route::get('/', 'BannerController@index')->name('index');
    Route::post('/upload/temp', 'BannerController@upload')->name('upload');

    Route::post( '/load/{type}', 'BannerController@load' )->name('types');
});

Route::group(['namespace' => 'User'], function () {

    /** Users */
    Route::get('users/trashed', 'UserController@listTrashed')->name('users.trashed');
    Route::get('users/recover/{id}', 'UserController@recover')->name('users.recover');
    Route::resource('users', 'UserController');

    /** Permissions */
    Route::resource('permissions', 'PermissionController');

    /** Role */
    Route::resource('roles', 'RoleController');

});

/** Ongs */
Route::group(['as' => 'ongs.', 'namespace' => 'Ong', 'prefix' => 'ongs'], function () {

    Route::get('/details', 'OngController@showDetails')->name('details');
});