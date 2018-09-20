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

/*Route::get('/', function () {
    return view('welcome');
});*/
Route::get('/', 'HomeController@index');



/*Route::get('/home', 'HomeController@index')->name('home');

Route::get('/test', 'MojKontroler@index');*/

Route::prefix('admin')->group(function() {
    Route::get('/login', 'Auth\AdminLoginController@showLoginForm')->name('admin.login');
    Route::post('/login', 'Auth\AdminLoginController@login')->name('admin.login.submit');
    Route::get('/logout', 'Auth\AdminLoginController@logout');
    Route::get('/upravljanje', 'AdminController@index')->name('admin.home');
});

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');

Route::get('/logout', 'Auth\LoginController@logout');

Route::get('/user', 'HomeController@user');

Route::get('/registracija', 'Register@showRegistrationForm')->name('admin.register');
Route::post('/registracija', 'Register@register')->name('admin.register.submit');
