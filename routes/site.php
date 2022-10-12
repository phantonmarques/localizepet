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

//Auth::routes();
    //* $this->get('email/verify', 'Auth\VerificationController@show')->name('verification.notice');
    //        $this->get('email/verify/{id}', 'Auth\VerificationController@verify')->name('verification.verify');
    //        $this->get('email/resend', 'Auth\VerificationController@resend')->name('verification.resend');


    /**
     *
     * CRIAR MIDDLEWARE PARA VERIFICAR CONFIRMAÇÃO DE E-MAIL EM ROTAS DE LOGADO
     */

Route::get('/', 'HomeController@index')->name('index');
Route::get('contato', 'HomeController@contact')->name('contact'); // criar metodo

/** Ajax */
Route::group(['as' => 'ajax.', 'namespace' => 'Ajax'], function (){

    Route::get('search-cities/{state_id}', 'AjaxController@searchCities')->name('search-cities');
});

/** Authentication */
Route::group([ 'as' => 'auth.', 'namespace' => 'Auth'], function () {

    # Login/Logout
    Route::get('entrar', 'LoginController@showLogin')->name('show-login');
    Route::post('entrar', 'LoginController@login')->name('login');
    Route::post('sair', 'LoginController@logout')->name('logout');

    # Register User Simple
    Route::get('cadastrar', 'RegisterController@create')->name('show-register');
    Route::post('cadastrar', 'RegisterController@store')->name('register');

    # Confirm e-mail
    Route::get('confirmar', 'RegisterController@showConfirm')->name('show-confirm');
    Route::get('confirmar/{token}', 'RegisterController@confirm')->name('confirm');


    /** REFAZER TUDO ABAIXO --------- */
    Route::group(['prefix' => 'password'], function () {

        # Reset Password /** AINDA NÃO ESTÁ PRONTO */
        Route::get('resetar-senha', 'ResetPasswordController@showLinkRequestForm')->name('password');
        Route::post('resetar-senha', 'ResetPasswordController@reset')->name('password-reset');
        Route::get('resetar-senha/{token}', 'ResetPasswordController@showResetForm')->name('site.auth.password-form');

    });

});
