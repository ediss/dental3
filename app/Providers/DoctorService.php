<?php

namespace App\Providers;

use App\Models\Admin as Doctor;
use App\Models\DoctorPatient as Patients;

use App\Providers\PermissionService;
use App\Providers\AppointmentService;
use Illuminate\Support\Facades\Auth;


class DoctorService
{
  /**
   *
   * READ
   *
   */

    public static function getPatients() {
       $doctor = self::getCurrentDoctor();

       $users = Patients::join('users', 'patient_id', '=', 'users.id')
                ->join('admins', 'doctor_id', '=', 'admins.id')
                ->where('doctor_id', $doctor->id)
                ->select('users.name as patient_name', 'admins.name as doctor_name')
                ->get();

       return $users;
    }

    public static function getDoctors() {
        return  Doctor::where('role_id', '2')->get();
    }

    public static function getCurrentDoctor() {
        return Auth::guard('admin')->user();
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
        if(!PermissionService::checkPermission('userModify')) throw new \Exception('Nemate dozvolu da izmenite podatke o doktoru!');
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
        if(!PermissionService::checkPermission('userModify')) throw new \Exception('Nemate dozvolu da izbrisete doktora!');
        $doctor =  Doctor::find($id);

        $doctor->delete();
    }
}