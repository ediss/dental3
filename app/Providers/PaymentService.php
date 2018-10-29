<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use App\Models\Payment;
class PaymentService extends ServiceProvider {

    /**
     * 
     * READ
     * 
     */

    /**
    * Get all payments in clinic for all patients!
    *
    * @return Payment
    */
    public static function getAllPayments() {
        return Payment::all();
    }


    //Create or update payment
    public static function createOrUpdate($data, $payment_id = null) {
        $payment = null;

        if (!empty($patient_id)) {
            $payment = Payment::find($payment_id);
        } else {
            $payment = Payment::
                where('patient_id', '=', $data['patient_id'])
                ->where('date_payment', '=', $data['date'])
                ->where('term_id', '=', $data['term_id'])
                ->first()
            ;
        }


        !empty($payment) ? self::update($data, $payment->id_payment) : self::paid($data);
    }

    public static function paid($data) {
        $payment = new Payment;

        $payment->date_payment  = $data['date'];
        $payment->paid          = $data['paid_service'];
        $payment->patient_id    = $data['patient_id'];
        $payment->service_id    = $data['service_id'];
        $payment->term_id       = $data['term_id'];
        //ubaciti i zub

        $payment->save();
    }


    public static function update($data, $payment_id) {
        $payment = Payment::find($payment_id);

        $payment->paid          = $data['paid_service'];
        //ubaciti i zub

        $payment->save();
    }
}
