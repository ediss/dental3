<?php

namespace App\Providers;

use App\Models\Admin as Doctor;
use App\Providers\PermissionService;
use App\Providers\AppointmentService;

class DoctorService 
{
    public static function zakazivanjePregleda(
        $patient_id,
        $doctor_id,
        $term_id,
        $service_id
    ) {
        return AppointmentService::createAppointment(
            $patient_id,
            $doctor_id,
            $term_id,
            $service_id
        );
    }
}