<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Providers\AppointmentService;
use App\Providers\AdminService;
use App\Providers\UserService;


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
     * Get the data from appoitments table and passing it to view
     *
     * @return void
     */
    public function patientsAppointments() {
/*       $appointmets = array(
        AppointmentService::getAppointments(),
        Admin::find(1),
       );

        return view('appointments', $appointmets);
        //$user = Admin::find(1);*/

<<<<<<< HEAD
        return view('appointments', ['appointmets' => AppointmentService::getAppointments(), 'admin' => AdminService::getCurrentAdmin()]);
=======
        return view('appointments', $appointmets);*/

        return view('appointments', ['appointments' => AppointmentService::getAppointments()]);
>>>>>>> 859247fd8e9d60c5b8f48629c39f3e7b126fca7c
    }

    /**
     * Function for listing all patient's
     *
     * @return User
     */
    public function showPatients() {
        return view('admin/admin-patient', ['patients' => UserService::getUsers()]);
    }


    /**
     * Edit patients data
     *
     * @param       $id     user id
     * @return void
     */
    public function editPatient($id) {
        return view('admin/patient-edit', ['patient'=>UserService::editUser()]);
    }


}
