<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

use App\Providers\UserService;

class UserController extends Controller {
    /**
     * 
     * READ
     * 
     */
    

     /**
      * Get appointments of patient
      *
      * @return void
      */
    public function index() {
        $user = Auth::user()->id;
        return self::response('patient.user-home', ['appointments' => UserService::getPatientAppointments($user)]);
    }

    public function getPayments() {
        $patient_id = Auth::user()->id;

        return self::response('patient.patient-payments', ['payments' => UserService::getPatientPayments($patient_id)]);
    }


}
