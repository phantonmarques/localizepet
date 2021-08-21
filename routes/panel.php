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

Route::group( [ 'namespace' => 'Administrator', 'middleware' => 'auth' ], function () {

    Route::get( '/users/trashed', 'UsersController@listTrashed' )->name( 'users.trashed' );
    Route::resource( 'users', 'UsersController' );
 
 } );
 


