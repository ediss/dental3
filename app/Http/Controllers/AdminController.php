<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Providers\AppointmentService;

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
        return view('admin-home');
    }

    public function patientsAppointments() {
       /* $appointmets = AppointmentService::getAppointments();

        return view('appointments', $appointmets);*/
        return view('appointments', ['appointmets' => AppointmentService::getAppointments()]);
    }
}
