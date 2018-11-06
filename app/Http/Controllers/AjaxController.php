<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Providers\AppointmentService;
use App\Providers\PaymentService;
use App\Providers\PermissionService;
use Session;

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

    public function ajaxPermissionUpdate(Request $request) {
        $permission   = $request->varPermission;
        $description  = $request->varDescription;
        $hidden       = $request->varHiddenId;

        return PermissionService::updatePermission($permission, $description, $hidden);

        //Session::flash('success', 'Uspesno ste izmenili dozvolu!');

    }

}
