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

Route::group( [ 'middleware' => 'auth' ], function () {

    Route::get('home', 'HomeController@index')->name('home');

    Route::group( [ 'namespace' => 'User' ], function () {

        Route::get( 'users/trashed', 'UserController@listTrashed' )->name( 'user.trashed' );
        Route::resource( 'user', 'UserController' );

    } );

 } );
 


