<?php

namespace App\Providers;

use App\Models\Admin as Doctor;
use App\Providers\PermissionService;
use App\Providers\AppointmentService;

class DoctorService 
{
    /* public static function createAppointment(
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
    } */

    public static function createAppointment(
        $patient_id,
        $doctor_id,
        $date,
        $term_id,
        $service_id
    ) {
        return AppointmentService::createAppointment(
            $patient_id,
            $doctor_id,
            $date,
            $term_id,
            $service_id
        );
    }
}