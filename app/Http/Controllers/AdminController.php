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
        return view('admin/admin-home');
    }

    /**
     *
     * READ
     *
     */

     /**
     * Get the data from appoitments table and passing it to view
     *
     * @return void
     */
    public function patientsAppointments() {
        return view('appointments', ['appointmets' => AppointmentService::getAppointments(), 'admin' => AdminService::getCurrentAdmin()]);
    }


    public function getAdmins() {
        return view('admin/admins',     ['admins' => AdminService::getAdmins()]);
    }

    public function getAssistants() {
        return view('admin/assistants', ['assistants' => AssistantService::getAssistants()]);
    }

    public function getDoctors() {
        return view('admin/doctors',    ['doctors' => DoctorService::getDoctors()]);
    }

    public function getPatients() {
        return view('admin/patients',  ['patients' => UserService::getUsers()]);
    }

    public function getRoles() {
        return view('admin/roles',  ['roles' => RoleService::getRoles()]);
    }

    public function getPermissions() {
        return view('admin/permissions',    ['roles' => RoleService::getRoles(), 'permissions' => PermissionService::getPermissions()]);
    }

    public function getRolePermission() {
        return view('admin/add-role-permission',    ['roles' => RoleService::getRoles(), 'permissions' => PermissionService::getPermissions()]);
    }

    /**
     *
     * CREATE
     *
     */

    public function createRole() {
        return view ('admin/create-role');
    }

    public function storeRole(Request $request) {
        $name_role = $request->input('name');

        RoleService::createRole($name_role);

        Session::flash('success', 'Uspesno ste dodali novu ulogu!');

        return redirect('admin/pocetna');
    }

    public function createPermission() {
        return view ('admin/create-permission');

    }


    public function storePermission(Request $request) {
        $name_permission = $request->input('name');
        $description_permission = $request->input('description');

        PermissionService::createPermission($name_permission, $description_permission);

        Session::flash('success', 'Uspesno ste dodali novu dozvolu!');

        return redirect('admin/pocetna');
    }

    public function createRolePermission(Request $request) {
        $name_permission = $request->input('permissions');
        $role            = $request->input('roles');

        RolePermissionService::createRolePermission($name_permission, $role);

        Session::flash('success', 'Uspesno ste dodali dozvolu ulozi!');

        return redirect('admin/pocetna');
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

    public function editRole($id) {
        return view('admin/role-edit', ['role'=>RoleService::editRole($id)]);
    }

    public function updateRole(Request $request, $id_role) {
        $role  = $request->input('name');

        RoleService::updateRole($role, $id_role);

        Session::flash('success', 'Uspesno ste izmenili naziv uloge!');

        return redirect('admin/pocetna');

    }


    public function editPermission($id_permission) {
        return view('admin/permission-edit', ['permission'=>PermissionService::editPermission($id_permission)]);
    }

    public function updatePermission(Request $request, $id_permission) {
        $permission   = $request->input('name');
        $description  = $request->input('description');

        PermissionService::updatePermission($permission, $description, $id_permission);

        Session::flash('success', 'Uspesno ste izmenili dozvolu!');

        return redirect('admin/pocetna');

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

}
