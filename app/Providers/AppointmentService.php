<?php

namespace App\Providers;

use App\Models\Appointment;
use App\Providers\DoctorService;
use Session;

class AppointmentService {

    public static function getAppointments($date) {
        // samo one pacijente koji pripadaju doktoru koji je ulogovan
        $doctor = DoctorService::getCurrentDoctor()->id;
        $role   = DoctorService::getCurrentDoctor()->role_id;
        //$query = '';
        //zameni umesto role id da bude masinsko ime uloge
        if ($role == '2') {
            if($date === NULL ) {
                $query = Appointment::where('doctor_id', $doctor)->get();
            } else {
                $query = Appointment::where('doctor_id', $doctor)
                                    ->where('date_appoitment', '=', $date)
                                    ->get();
            }

        } else {
            ($date === NULL || $date === '' || empty($date))  ? $query = Appointment::all() : $query = Appointment::where ('date_appoitment', '=', $date)->get();

        }

        return $query;

    }

    public static function createAppointment($patient_id, $doctor_id, $date, $term_id, $service_id, $tooth) {
       // if(!PermissionService::checkPermission('appointmentModify')) throw new \Exception('Nemate dozvolu za zakazivanje pregleda!');


        $appointmenmt = new Appointment;

        $appointmenmt->patient_id       = $patient_id;
        $appointmenmt->doctor_id        = $doctor_id;
        $appointmenmt->date_appoitment  = $date;
        $appointmenmt->term_id          = $term_id;
        $appointmenmt->service_id       = $service_id;
        $appointmenmt->tooth            = $tooth;

        $appointmenmt->save();

        Session::flash('success', 'Uspesno ste zakazali pregled!');


    }

}
