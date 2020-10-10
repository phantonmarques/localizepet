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

Route::get('/', 'Site\\SiteController@index')->name('site.index');

Route::get('/home', 'HomeController@index')->name('home');

Route::get('/search-city', 'Site\\SiteController@searchCity')->name('site.search-city');

# Rotas para registrar usuários comuns
Route::get('/register', 'Auth\\LoginController@showRegistrationForm')->name('site.auth.register');
Route::post('register', 'Auth\\LoginController@register')->name('site.auth.register.action');

# Rotas de autenticação para todos usuários
Route::get('/login', 'Auth\\LoginController@showLogin')->name('site.auth.login');
Route::post('login', 'Auth\\LoginController@login')->name('site.auth.login.action');
Route::post('logout', 'Auth\\LoginController@logout')->name('site.auth.logout');

# Rotas para resetas senha para todos usuários
Route::get('/password/reset', 'Auth\\LoginController@showLinkRequestForm')->name('site.auth.password');
Route::post('password/reset', 'Auth\\LoginController@reset')->name('site.auth.password.action');
Route::get('/password/reset/{token}', 'Auth\\LoginController@showResetForm')->name('site.auth.password.reactive');




