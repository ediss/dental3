<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Providers\AppointmentService;
use App\Providers\PaymentService;


class AjaxController extends Controller
{
    /**
     * Return view with appointment form
     *
     * @param Request $request
     *
     */
    public function ajaxAppointments(Request $request) {
        $date = $request->varDate;

        return self::response('appointments-table', ['appointments' =>  AppointmentService::getAppointments($date)]);

    }


    /**
     * Return view with payment form
     *
     * @param Request $request
     *
     */
    public function ajaxPayments(Request $request) {
        $date = $request->varDate;

        return self::response('patient.payments-table', ['payments' =>  PaymentService::getPayments($date)]);

    }
}
