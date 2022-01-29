<?php

use Illuminate\Support\Facades\Route;

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

Auth::routes();

Route::group( [ 'as' => 'site.', 'namespace' => 'Site' ], function () {

    Route::get('/', 'HomeController@index')->name('index');

    Route::get('/search-city', 'HomeController@searchCity')->name('search-city');

    /** Authentication */
    Route::group( [ 'as' => 'auth.', 'namespace' => 'Auth' ], function () {

        # Login/Logout
        Route::get('/login', 'LoginController@showLogin')->name('login');
        Route::post('/login', 'LoginController@login')->name('login');
        Route::post('/logout', 'LoginController@logout')->name('logout');

        /** REFAZER TUDO ABAIXO --------- */
        # Register User Simple
        Route::get('/register', 'RegisterController@showRegistrationCommonForm')->name('register');
        Route::post('/common/register', 'RegisterController@registerCommon')->name('register');

        Route::group( [ 'prefix' => 'password' ], function () {

            # Reset Password /** AINDA NÃO ESTÁ PRONTO */
            Route::get('/reset', 'ResetPasswordController@showLinkRequestForm')->name('password');
            Route::post('/reset', 'ResetPasswordController@reset')->name('password-reset');
            Route::get('/reset/{token}', 'ResetPasswordController@showResetForm')->name('site.auth.password-form');

        });


    });

} );