<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Providers\AppointmentService;
use App\Providers\PaymentService;
use App\Providers\PermissionService;
use App\Providers\UserService;
use App\Providers\AdminService;

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

    public function ajaxPatientUpdate(Request $request) {
        $patient_name   = $request->varPatientName;
        $patient_email  = $request->varPatientEmail;
        $hidden       = $request->varHiddenId;

        return  UserService::updateUser($patient_name, $patient_email, $hidden);


        //Session::flash('success', 'Uspesno ste izmenili podatke o pacijentu!');

    }

    public function ajaxAdminUpdate(Request $request) {
        $admin_name   = $request->varAdminName;
        $admin_email  = $request->varAdminEmail;
        $hidden       = $request->varHiddenId;

       /* $request->validate( [
            'proba'  =>  'required',
            'email' =>  'required|unique:admins,email,'.$hidden.'|email',
        ]);*/
        return  AdminService::updateAdmin($admin_name, $admin_email, $hidden);

        //Session::flash('success', 'Uspesno ste izmenili podatke o adminu!');

    }

    /**
     *
     * DELETE
     *
     */

    public function ajaxDeletePermission(Request $request) {
        $permission_id = $request->varHiddenId;

        return PermissionService::deletePermission($permission_id);
    }

}
