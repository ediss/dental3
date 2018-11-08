<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Providers\AppointmentService;
use App\Providers\AdminService;
use App\Providers\UserService;
use App\Providers\RoleService;
use App\Providers\PermissionService;
use App\Providers\RolePermissionService;
use App\Providers\AssistantService;
use App\Providers\DoctorService;
use App\Providers\BookkeeperService;

use App\Models\Permission;
use App\Models\User;

use App\Exceptions\CustomException;

use Session;

class AdminController extends Controller
{

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth:admin');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return self::response('admin/admin-home');
    }

    /**
     *
     * READ
     *
     */



  /* #region get */
    /**
     * Get the data from appoitments table and passing it to view
     *
     * @return void
     */
    public function patientsAppointments(Request $request) {
        $date = null;

        return self::response('appointments',       ['appointments' => AppointmentService::getAppointments($date), 'admin' => AdminService::getCurrentAdmin()]);
    }

    public function getAdmins() {
        return self::response('admin/admins',       ['admins' => AdminService::getAdmins()]);
    }

    public function getAssistants() {
        return self::response('admin/assistants',   ['assistants' => AssistantService::getAssistants()]);
    }

    public function getDoctors() {
        return self::response('admin/doctors',      ['doctors' => DoctorService::getDoctors(), 'id'=>DoctorService::getCurrentDoctor()]);
    }

    public function getBookkeepers() {
        return self::response('admin/bookkeepers',  ['bookkeepers' => BookkeeperService::getBookkeepers()]);
    }

    public function getPatients() {
        return self::response('admin/patients',     ['patients' => UserService::getUsers()]);
    }



    public function getRoles() {
        return self::response('admin/roles');

        //return view('admin/roles',  ['roles' => RoleService::getRoles()]);
    }

    public function getPermissions() {
        return self::response('admin/permissions',  ['permissions' => PermissionService::getPermissions()]);

    }

    public function getRolePermission() {
        return self::response('admin/add-role-permission', ['permissions' => PermissionService::getAllPermissions()]);
    }

    public function getDoctorPatients() {
        return self::response('admin/assignment-patient',  ['doctors' => DoctorService::getDoctors(), 'patients' => UserService::getUnassignedUsers()]);

        // return view('admin/assignment-patient',    ['doctors' => DoctorService::getDoctors(), 'patients' => UserService::getUsers(), 'roles' => RoleService::getRoles()]);
    }

    public function getPayments() {
        return self::response('admin.payments', ['payments' => PaymentService::getAllPayments()]);
    }

    public function userProfile() {
        return self::response('user-profile', ['user' => AdminService::getCurrentAdmin()]);
    }
  /* #endregion */


    /**
     *
     * CREATE
     *
     */

    public function createRole() {
        //samo admin moze da kreira uloge
        return self::response('admin/create-role');
    }

    public function storeRole(Request $request) {
        //samo admin moze da kreira uloge
        $name_role = $request->input('role');

        $request->validate( [
            'role'  =>  'required|unique:roles,role',
        ]);

        RoleService::createRole($name_role);

        Session::flash('success', 'Uspešno ste dodali novu ulogu!');

        return redirect('admin/pocetna');
    }

    public function createPermission() {
        if(!PermissionService::checkPermission('permissionModify')) throw new CustomException('Nemate dozvolu za dodavanje dozvole!');
        return self::response('admin/create-permission');

    }


    public function storePermission(Request $request) {
        //samo admin moze da kreira dozvole
        $name_permission = $request->input('permission_name');
        $description_permission = $request->input('description');

        $request->validate( [
            'permission_name'  =>  'required|unique:permissions,permission',
        ]);

        PermissionService::createPermission($name_permission, $description_permission);

        Session::flash('success', 'Uspešno ste dodali novu dozvolu!');

        return redirect('admin/dozvole');
    }

    public function createRolePermission(Request $request) {
        if(!PermissionService::checkPermission('permissionModify')) throw new CustomException ('Nemate dozvolu za dodavanje dozvole!');

        $name_permission = $request->input('permissions');
        $role            = $request->input('roles');

        RolePermissionService::createRolePermission($name_permission, $role);

        return redirect('admin/pocetna');
    }


    /**
     * DODELJNIVANJE PACIJENTA DOKTORU
     *
     * @param Request $request
     * @return void
     */
    public function assigmentPatient(Request $request) {
        if(!PermissionService::checkPermission('assignmentPatient')) throw new CustomException ('Nemate dozvolu da dodelite pacijenta!');

        $patient = $request->input('patients');
        $doctor  = $request->input('doctors');

        DoctorService::assignmentPatient($patient, $doctor);

        Session::flash('success', 'Uspešno ste dodelili pacijenta doktoru!');

        return redirect('admin/pacijenti/dodeljivanje');
        //
    }

    /**
     *
     *UPDATE
     *
     *
    */

    public function updateRole(Request $request, $id_role) {
        $role  = $request->input('name');

        $request->validate( [
            'role'  =>  'required|unique:roles,role',
        ]);

        RoleService::updateRole($role, $id_role);

        Session::flash('success', 'Uspešno ste izmenili naziv uloge!');

        return self::response('admin/roles');

    }



    /**
     *
     * DELETE
     *
     */


    public function deleteRole($id) {
        RoleService::deleteRole($id);

        Session::flash('success', 'Uspešno ste izbrisali ulogu!');

        return redirect('admin/pocetna');
    }


}
