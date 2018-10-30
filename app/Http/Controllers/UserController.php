<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

use App\Providers\UserService;
use App\Providers\PaymentService;


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
        $date = null;
        return self::response('admin.payments', ['payments' => PaymentService::getPayments($date)]);
    }


}
