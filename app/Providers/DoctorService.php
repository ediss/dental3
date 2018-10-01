<?php

namespace App\Providers;

use App\Models\Admin as Doctor;
use App\Providers\PermissionService;
use App\Providers\AppointmentService;

class DoctorService
{
  /**
   *
   * READ
   *
   */

    public static function getDoctors() {
        return  Doctor::where('role_id', '2')->get();
    }


   /**
    *
    *CREATE
    *
    */

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

    /**
     * 
     * UPDATE
     * 
     */

    public static function updateDoctor($name, $email, $id) {
        $doctor = Doctor::find($id);

        $doctor->name  = $name;
        $doctor->email = $email;

        $doctor->save();
    }
    
    /**
     *
     * DELETE
     *
     */

    public static function deleteDoctor($id) {
        $doctor =  Doctor::find($id);

        $doctor->delete();
    }
}