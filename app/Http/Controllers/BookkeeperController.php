<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

use App\Providers\PaymentService;

class BookkeeperController extends Controller {

    public function getPayments() {
        return self::response('patient.patient-payments', ['payments' => PaymentService::getAllPayments()]);
    }
}