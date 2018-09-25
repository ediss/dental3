<?php

namespace App\Providers;

<<<<<<< HEAD
=======
use Illuminate\Support\ServiceProvider;
>>>>>>> 859247fd8e9d60c5b8f48629c39f3e7b126fca7c
use App\Models\Appointment;

class AppointmentService {

    public static function getAppointments() {
<<<<<<< HEAD
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
        
=======
        $appointments = Appointment::all();

        return $appointments;
>>>>>>> 859247fd8e9d60c5b8f48629c39f3e7b126fca7c
    }

}
