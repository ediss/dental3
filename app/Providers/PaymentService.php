<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use App\Models\Payment;
class PaymentService extends ServiceProvider {

    public static function paid($patient_id, $service_id, $date, $term_id, $paid_service) {
        $payment = new Payment;

        $payment->date_payment  = $date;
        $payment->paid          = $paid_service;
        $payment->patient_id    = $patient_id;
        $payment->service_id    = $service_id;
        $payment->term_id       = $term_id;

        $payment->save();
    }
}
