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
    Route::get('/login',                        'Auth\AdminLoginController@showLoginForm') ->name('admin.login');
    Route::post('/login',                       'Auth\AdminLoginController@login')         ->name('admin.login.submit');

    Route::get('/pocetna',                      'AdminController@index')                   ->name('admin.home');

    Route::get('/registracija',                 'Register@showRegistrationForm')           ->name('admin.registracija');
    Route::post('/registracija',                'Register@register')                       ->name('admin.registracija.submit');

    Route::get('/admini',                       'AdminController@getAdmins')               ->name('admin.users.admins');

    Route::get('/doktori',                      'AdminController@getDoctors')              ->name('admin.users.doctors');

    Route::get('/asistenti',                    'AdminController@getAssistants')           ->name('admin.users.assistants');

    Route::get('/knjigovodje',                  'AdminController@getBookkeepers')          ->name('admin.users.bookkeepers');

    Route::post('/admini/update',               'AjaxController@ajaxAdminUpdate');
    Route::post('/admini/brisanje',             'AjaxController@ajaxAdminDelete');

    Route::get('/pacijenti',                    'AdminController@getPatients')             ->name('admin.users.patients');
    Route::get('/pacijenti/ajax',               'AjaxController@ajaxGetPatients');

    Route::post('/pacijenti/update',            'AjaxController@ajaxPatientUpdate');

    Route::post('/pacijenti/brisanje',          'AjaxController@ajaxPatientDelete');

    Route::get('/dodavanje-uloge',              'AdminController@createRole')              ->name('admin.role.create');
    Route::post('/uloge/nova-uloga',            'AdminController@storeRole')               ->name('admin.role.create.submit');

    Route::get('/uloge',                        'AdminController@getRoles')                ->name('admin.roles');

    Route::get('/izmena-uloge/{id}',            'AdminController@editRole')                ->name('admin.role.edit');
    Route::post('/izmena-uloge/{id}',           'AdminController@updateRole')              ->name('admin.role.update');

    Route::get('/uloge/brisanje/{id}',          'AdminController@deleteRole')              ->name('admin.role.delete');

    Route::get('/dozvole',                      'AdminController@getPermissions')          ->name('admin.permissions');

    Route::post('/dozvole/update',              'AjaxController@ajaxPermissionUpdate');
    Route::get('/dozvole/ajax',                 'AjaxController@ajaxGetPermission');

    Route::get('/dozvole/dodavanje',            'AdminController@createPermission')        ->name('admin.permission.create');
    Route::post('/dozvole/dodavanje',           'AdminController@storePermission')         ->name('admin.permission.create.submit');

    Route::post('/ajaxPermissionUpdate',        'AjaxController@ajaxPermissionUpdate');

    Route::post('/dozvole/brisanje',            'AjaxController@ajaxDeletePermission');

    Route::get('/dozvole/dodeljivanje',         'AdminController@getRolePermission')       ->name('admin.role-permission.create');
    Route::post('/dozvole/dodeljivanje',        'AdminController@createRolePermission')    ->name('admin.role-permission.create.submit');

    Route::get('/pacijenti/dodeljivanje',       'AdminController@getDoctorPatients')       ->name('assignment.patients');
    Route::post('/pacijenti/dodeljivanje',      'AdminController@assigmentPatient')        ->name('admin.assigngment-patient.submit');

    Route::get('/pacijent-profil/{id}',         'AdminController@userProfile')             ->name('user.profile');
    Route::get('/logout',                       'Auth\AdminLoginController@logout')        ->name('admin.logout');
});




Route::prefix('doktor')->group(function () {

    Route::get('/pacijenti',            'DoctorController@getPatients')             ->name('doctor.patients');

    Route::get('/zakazivanje',          'DoctorController@index')                   ->name('doctor.make-appointment');

    Route::post('/pacijenti',           'DoctorController@createAppointment')       ->name('doctor.make-appointment.submit');

    Route::get('/karton/{id}',          'DoctorController@patientMedicalHistory')   ->name('patient.medical.history');

    Route::post('/karton/{id}',         'DoctorController@insertPatientFiles')      ->name('doctor.insert.patient.files');

    Route::get('/pregledi',             'AdminController@patientsAppointments')     ->name('doktor.pregledi');


});

Auth::routes();

Route::prefix('pacijent')->group(function () {
    Route::get('/pregledi', 'UserController@index')         ->name('patient.appointments');

    Route::get('/placanja', 'UserController@getPayments')   ->name('patient.payments');
});









Route::get('/ajaxAppointments',         'AjaxController@ajaxAppointments');

Route::get('/ajaxPayments',             'AjaxController@ajaxPayments');

Route::get('uvid-u-placanja',           'BookkeeperController@getPayments')       ->name('bookkeeper.payments');

Route::get('/home',                     'HomeController@index')                   ->name('home');

//
Route::post('doktor/pregledi/{id}',     'DoctorController@done_appointment')      ->name('doctor.done-appointment');
//


Route::get('/logout',                   'Auth\LoginController@logout')            ->name('logout');



