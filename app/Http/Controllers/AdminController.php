<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Providers\AppointmentService;
use App\Providers\AdminService;
use App\Providers\UserService;
use App\Providers\RoleService;
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


}
