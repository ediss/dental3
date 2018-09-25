<?php

namespace App\Providers;

use App\Models\Appointment;

class AppointmentService {

    public static function getAppointments() {
        return Appointment::all();

    }

    public static function createAppointment(
        $patient_id,
        $doctor_id,
        $term_id,
        $service_id
    ) {
        if(!PermissionService::checkPermission('appointmentModify')) throw new Exception('Nemate dozbvolu za zakazivanje pregleda!');

        $appointmenmt = new Appointment;

        $appointmenmt->patient_id = $patient_id;
        /*
            isto za ostale parametre
        */

        $appointmenmt->save();
        
    }

}
