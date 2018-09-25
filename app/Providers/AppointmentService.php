<?php

namespace App\Providers;

use App\Models\Appointment;

class AppointmentService {

    public static function getAppointments() {
        return Appointment::all();

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

        //return redirect('admin/pocetna'); // ne stavljaj u servis redisrect nego u kontroller

    }

}
