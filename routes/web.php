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

Route::group(['prefix' => 'admin',  'middleware' => 'auth'], function() {

    Route::get('/login',                    'Auth\AdminLoginController@showLoginForm') ->name('admin.login');

    Route::post('/login',                   'Auth\AdminLoginController@login')         ->name('admin.login.submit');

    Route::get('/pocetna',                  'AdminController@index')                   ->name('admin.home');

    Route::get('/registracija',             'Register@showRegistrationForm')           ->name('admin.registracija');

    Route::post('/registracija',            'Register@register')                       ->name('admin.registracija.submit');

    Route::get('/pacijenti',                'AdminController@showPatients')            ->name('admin.upravljanje.pacijenti');

    Route::get('/pacijenti/izmena',         'AdminController@editPatient');             /*->name('admin.patient.edit');*/

    Route::get('/pacijenti/brisanje',       'AdminController@editPatient')             ->name('admin.patient.delete');

    Route::get('/pregledi',                 'AdminController@patientsAppointments')    ->name('admin.pregledi');

    Route::get('/logout',                   'Auth\AdminLoginController@logout')        ->name('admin.logout');
});


Route::prefix('doktor')->group(function () {
    
    Route::get('/zakazivanje',  'DoctorController@index')               ->name('doctor.make-appointment');
    
    Route::post('/zakazivanje', 'DoctorController@createAppointment')   ->name('doctor.make-appointment.submit');

});

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');



Route::get('/logout', 'Auth\LoginController@logout');

Route::get('/user', 'HomeController@user')->name('user');


