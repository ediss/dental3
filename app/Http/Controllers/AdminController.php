<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Providers\AppointmentService;
use App\Providers\AdminService;
use App\Providers\UserService;
use App\Providers\RoleService;
use App\Providers\PermissionService;
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

    /**
     * Function for listing all patient's
     *
     * @return User
     */
    public function showPatients() {
        return view('admin/admin-patient', ['patients' => UserService::getUsers()]);
    }

    public function getRoles() {
        return view('admin/roles', ['roles' => RoleService::getRoles()]);
    }

    public function getPermissions() {
        return view('admin/permissions', ['permissions' => PermissionService::getPermissions()]);
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


    /**
     *
     *UPDATE
     *
     *
    */

    /**
     * Edit patients data
     *
     * @param       $id     user id
     * @return void
     */
    public function editPatient($id) {
        return view('admin/patient-edit', ['patient'=>UserService::editUser($id)]);
    }

    public function updatePatient(Request $request, $id) {
        $name  = $request->input('name');
        $email = $request->input('email');

        UserService::updateUser($name, $email, $id);

        Session::flash('success', 'Uspesno ste izmenili podatke o korisniku!');

        return redirect('admin/pocetna');

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


    /**
     * 
     * DELETE
     * 
     */

    public function deleteUser($id) {
        UserService::deleteUser($id);

        Session::flash('success', 'Uspesno ste izbrisali korisnika!');

        return redirect('admin/pocetna');
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

}
