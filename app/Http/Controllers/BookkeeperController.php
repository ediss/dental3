<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

use App\Providers\PaymentService;

class BookkeeperController extends Controller {

    public function __construct() {
        $this->middleware('auth:admin');
    }

    public function getPayments() {
        $date = null;
        return self::response('admin.payments', ['payments' => PaymentService::getPayments($date)]);
    }
}