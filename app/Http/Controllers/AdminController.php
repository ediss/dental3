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


use App\Models\User;
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
       // $datum = json_encode($request->promenljiva);

        //$date = self::test();

        //$date = response()->json($datum);
        $date = null;
        //$date = $request->date;

        return self::response('appointments', ['appointments' => AppointmentService::getAppointments($date), 'admin' => AdminService::getCurrentAdmin()]);
    }

    /**
     * Return view with appointment form
     *
     * @param Request $request
     *
     */
    public function ajaxAppointmentsForm(Request $request) {
        $date = $request->varDate;

        return self::response('appointments-table', ['appointments' =>  AppointmentService::getAppointments($date)]);


    }


    public function getAdmins() {
        return self::response('admin/admins', ['admins' => AdminService::getAdmins()]);

        //return view('admin/admins',     ['admins' => AdminService::getAdmins(), 'roles' => RoleService::getRoles()]);
    }

    public function getAssistants() {
        return self::response('admin/assistants', ['assistants' => AssistantService::getAssistants()]);
    }

    public function getDoctors() {
        return self::response('admin/doctors',    ['doctors' => DoctorService::getDoctors(), 'id'=>DoctorService::getCurrentDoctor()]);
    }

    public function getPatients() {
        return self::response('admin/patients',   ['patients' => UserService::getUsers()]);
    }

    public function getBookkeepers() {
        return self::response('admin/bookkeepers',   ['bookkeepers' => BookkeeperService::getBookkeepers()]);
    }

    public function getRoles() {
        return self::response('admin/roles');

        //return view('admin/roles',  ['roles' => RoleService::getRoles()]);
    }

    public function getPermissions() {
        return self::response('admin/permissions', ['permissions' => PermissionService::getPermissions()]);

        // return view('admin/permissions',    ['roles' => RoleService::getRoles(), 'permissions' => PermissionService::getPermissions()]);
    }

    public function getRolePermission() {
        return self::response('admin/add-role-permission', ['permissions' => PermissionService::getPermissions()]);
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
        $name_role = $request->input('name');

        RoleService::createRole($name_role);

        Session::flash('success', 'Uspesno ste dodali novu ulogu!');

        return redirect('admin/pocetna');
    }

    public function createPermission() {
        if(!PermissionService::checkPermission('permissionModify')) throw new \Exception('Nemate dozvolu za dodavanje dozvole!');
        return self::response('admin/create-permission');

    }


    public function storePermission(Request $request) {
        //samo admin moze da kreira dozvole
        $name_permission = $request->input('name');
        $description_permission = $request->input('description');

        PermissionService::createPermission($name_permission, $description_permission);

        Session::flash('success', 'Uspesno ste dodali novu dozvolu!');

        return redirect('admin/pocetna');
    }

    public function createRolePermission(Request $request) {
        if(!PermissionService::checkPermission('permissionModify')) throw new \Exception('Nemate dozvolu za dodavanje dozvole!');

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
        if(!PermissionService::checkPermission('assignmentPatient')) throw new \Exception('Nemate dozvolu da dodelite pacijenta!');

        $patient = $request->input('patients');
        $doctor  = $request->input('doctors');

        DoctorService::assignmentPatient($patient, $doctor);

        Session::flash('success', 'Uspesno ste dodelili pacijenta doktoru!');

        return redirect('admin/pacijenti/dodeljivanje');
        //
    }

    /**
     *
     *UPDATE
     *
     *
    */

    public function updatePatient(Request $request, $id) {
        $name  = $request->input('name');
        $email = $request->input('email');

        UserService::updateUser($name, $email, $id);

        Session::flash('success', 'Uspesno ste izmenili podatke o pacijentu!');

        return redirect('admin/pacijenti');

    }

    /*public function editRole($id) {
        return self::response('admin/role-edit', ['role'=>RoleService::editRole($id)]);
    }*/

    public function updateRole(Request $request, $id_role) {
        $role  = $request->input('name');

        RoleService::updateRole($role, $id_role);

        Session::flash('success', 'Uspesno ste izmenili naziv uloge!');

        return self::response('admin/roles');

    }


    /*public function editPermission($id_permission) {
        return self::response('admin/permission-edit',  ['permission'=>PermissionService::editPermission($id_permission)]);

        //return view('admin/permission-edit', ['permission'=>PermissionService::editPermission($id_permission)]);
    }*/

    public function updatePermission(Request $request, $id_permission) {
        $permission   = $request->input('name');
        $description  = $request->input('description');

        PermissionService::updatePermission($permission, $description, $id_permission);

        Session::flash('success', 'Uspesno ste izmenili dozvolu!');

        return self::response('admin/permissions');

    }

    public function updateDoctor(Request $request, $id) {
        $name   = $request->input('name');
        $email  = $request->input('email');

        DoctorService::updateDoctor($name, $email, $id);

        Session::flash('success', 'Uspesno ste izmenili podatke o doktoru!');

        return redirect('admin/doktori');

    }

    public function updateAdmin(Request $request, $id) {
        $name   = $request->input('name');
        $email  = $request->input('email');

        AdminService::updateAdmin($name, $email, $id);

        Session::flash('success', 'Uspesno ste izmenili podatke o adminu!');

        return redirect('admin/admini');

    }

    public function updateAssistant(Request $request, $id) {
        $name   = $request->input('name');
        $email  = $request->input('email');

        AssistantService::updateAssistant($name, $email, $id);

        Session::flash('success', 'Uspesno ste izmenili podatke o asistentu!');

        return redirect('admin/asistenti');

    }

    public function updateBookkeeper(Request $request, $id) {
        $name   = $request->input('name');
        $email  = $request->input('email');

        BookkeeperService::updateBookkeeper($name, $email, $id);

        Session::flash('success', 'Uspesno ste izmenili podatke o knjigovodji!');

        return redirect('admin/knjigovodje');

    }


    /**
     *
     * DELETE
     *
     */

    public function deleteUser($id) {
        UserService::deleteUser($id);

        Session::flash('success', 'Uspesno ste izbrisali pacijenta!');

        return redirect('admin/pacijenti');
    }


    public function deleteRole($id) {
        RoleService::deleteRole($id);

        Session::flash('success', 'Uspesno ste izbrisali ulogu!');

        return redirect('admin/pocetna');
    }

    public function deletePermission($id) {
        PermissionService::deletePermission($id);

        Session::flash('success', 'Uspesno ste izbrisali dozvolu!');

        return redirect('admin/pocetna');
    }

    public function deleteDoctor($id) {
        DoctorService::deleteDoctor($id);

        Session::flash('success', 'Uspesno ste izbrisali doktora!');

        return redirect('admin/doktori');
    }

    public function deleteAdmin($id) {
        AdminService::deleteAdmin($id);

        Session::flash('success', 'Uspesno ste izbrisali admina!');

        return redirect('admin/admini');
    }

    public function deleteAssistant($id) {
        AssistantService::deleteAssistant($id);

        Session::flash('success', 'Uspesno ste izbrisali asistenta!');

        return redirect('admin/asistenti');
    }

    public function deleteBookkeeper($id) {
        BookkeeperService::deleteBookkeeper($id);

        Session::flash('success', 'Uspesno ste izbrisali knjigovodju!');

        return redirect('admin/knjigovodje');
    }

}
