<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use App\Models\Payment;
use Illuminate\Support\Facades\Auth;

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
    public static function getPayments($date) {
        //return Payment::all();
        if(Auth::guard('admin')->check()) {

            if(empty($date)) {
                $query = Payment::all();
            }
            else {
                $query = Payment::where('date_payment', '=', $date)->get();
            }
        }
        else {
            $patient_id = Auth::user()->id;
            if($date === NULL || $date === '' || empty($date)) {
                $query = Payment::where('patient_id', '=', $patient_id)->get();
            }
            else {

                $query = Payment::where('date_payment', '=', $date)
                                    ->where('patient_id', '=', $patient_id)->get();
            }
        }

        return $query;
    }



    public static function getPatientPayments($patient_id) {
        return  Payment::where('patient_id', $patient_id)->get();
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
