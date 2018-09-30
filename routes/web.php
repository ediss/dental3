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

//Route::group(['prefix' => 'admin',  'middleware' => 'auth'], function() {

Route::prefix('admin')->group(function () {
    Route::get('/login',                    'Auth\AdminLoginController@showLoginForm') ->name('admin.login');
    Route::post('/login',                   'Auth\AdminLoginController@login')         ->name('admin.login.submit');

    Route::get('/pocetna',                  'AdminController@index')                   ->name('admin.home');

    Route::get('/registracija',             'Register@showRegistrationForm')           ->name('admin.registracija');
    Route::post('/registracija',            'Register@register')                       ->name('admin.registracija.submit');

    Route::get('/pacijenti',                'AdminController@getPatients')             ->name('admin.upravljanje.pacijenti');

    Route::get('/pacijenti-izmena/{id}',    'AdminController@editPatient')             ->name('admin.patient.edit');
    Route::post('/pacijenti-izmena/{id}',   'AdminController@updatePatient')           ->name('admin.patient.update');

    Route::get('/pacijenti/brisanje/{id}',  'AdminController@deleteUser')              ->name('admin.patient.delete');

    Route::get('/dodavanje-uloge',          'AdminController@createRole')              ->name('admin.role.create');
    Route::post('/uloge/nova-uloga',        'AdminController@storeRole')               ->name('admin.role.create.submit');

    Route::get('/uloge',                    'AdminController@getRoles')                ->name('admin.roles');

    Route::get('/izmena-uloge/{id}',        'AdminController@editRole')                ->name('admin.role.edit');
    Route::post('/uloge/izmena/{id}',       'AdminController@updateRole')              ->name('admin.role.update');

    Route::get('/uloge/brisanje/{id}',      'AdminController@deleteRole')              ->name('admin.role.delete');

    Route::get('/dozvole',                  'AdminController@getPermissions')          ->name('admin.permissions');

    Route::get('/dozvole/dodavanje',        'AdminController@createPermission')        ->name('admin.permission.create');
    Route::post('/dozvole/dodavanje',       'AdminController@storePermission')         ->name('admin.permission.create.submit');

    Route::get('/dozvole/izmena/{id}',      'AdminController@editPermission')          ->name('admin.permission.edit');
    Route::post('/dozvole/izmena/{id}',     'AdminController@updatePermission')        ->name('admin.permission.update');

    Route::get('/dozvole/brisanje/{id}',    'AdminController@deletePermission')        ->name('admin.permission.delete');

    Route::get('/dozvole/doeljivanje',      'AdminController@getRolePermission')       ->name('admin.role-permission.create');
    Route::post('/dozvole/doeljivanje',     'AdminController@createRolePermission')    ->name('admin.role-permission.create.submit');

    Route::get('/logout',                   'Auth\AdminLoginController@logout')        ->name('admin.logout');
});


Route::prefix('doktor')->group(function () {

    Route::get('/zakazivanje',  'DoctorController@index')               ->name('doctor.make-appointment');

    Route::post('/zakazivanje', 'DoctorController@createAppointment')   ->name('doctor.make-appointment.submit');

});

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');

Route::get('doktor/pregledi',     'AdminController@patientsAppointments')->name('doktor.pregledi');

Route::get('/logout', 'Auth\LoginController@logout');

Route::get('/user', 'HomeController@user')->name('user');


