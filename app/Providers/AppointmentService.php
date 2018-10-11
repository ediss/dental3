<?php

namespace App\Providers;

use App\Models\Appointment;
use App\Providers\DoctorService;


class AppointmentService {

    public static function getAppointments() {
        // samo one pacijente koji pripadaju doktoru koji je ulogovan

        $doctor = DoctorService::getCurrentDoctor()->id;
        $role   = DoctorService::getCurrentDoctor()->role_id;
        //zameni umesto role id da bude masinsko ime uloge
        if($role == '2'){
            return Appointment::where('doctor_id', $doctor)->get();
        }else{
            return Appointment::all();
        }


    }

    public static function createAppointment($patient_id, $doctor_id, $date, $term_id, $service_id) {
        if(!PermissionService::checkPermission('appointmentModify')) throw new \Exception('Nemate dozbvolu za zakazivanje pregleda!');

        $appointmenmt = new Appointment;

        $appointmenmt->patient_id       = $patient_id;
        $appointmenmt->doctor_id        = $doctor_id;
        $appointmenmt->date_appoitment  = $date;
        $appointmenmt->term_id          = $term_id;
        $appointmenmt->service_id       = $service_id;

        $appointmenmt->save();


    }

}
