<?php

namespace App\Providers;

use App\Models\Admin as Doctor;
use App\Models\User as Patient;
use App\Models\DoneService;
use App\Models\Appointment;

use App\Providers\PermissionService;
use App\Providers\AppointmentService;
use App\Providers\UserService;
use App\Exceptions\CustomException;
use Illuminate\Support\Facades\Auth;


class DoctorService
{
  /**
   *
   * READ
   *
   */

   public static function done_appointment($done_service, $id_appointment) {
    if(!PermissionService::checkPermission('done_appointment')) throw new CustomException('Nemate dozvolu za dodavanje informacija o pregledu!');

    $appoitment = Appointment::find($id_appointment);

    $appoitment->service_done = $done_service;

    $appoitment->save();
   }

    public static function getPatients() {
        //dozvola
        $doctor = self::getCurrentDoctor();
        $role   = self::getCurrentDoctor()->role_id;

        if($role == '2') {
            $query = Patient::join('admins', 'doctor_id', '=', 'admins.id')
                            ->where('doctor_id', $doctor->id)
                            ->select('users.name as patient_name', 'admins.name as doctor_name', 'users.id as patient_id', 'gender', 'date_of_birth', 'users.email as patient_email')
                            ->get();
        }
        else {
            $query = UserService::getUsers();
        }

        return $query;

    }

    public static function getDoctors() {
        //ne zakucavaj role id
        return  Doctor::where('role_id', '2')->paginate(5);
    }

    public static function getCurrentDoctor() {
        return Auth::guard('admin')->user();
    }

    public static function getpatientMedicalHistory($patient_id){
       if(!PermissionService::checkPermission('medicalHistoryRead')) throw new CustomException('Nemate dozvolu za pregled kartona!');

        return  Appointment::where('patient_id', $patient_id)
                            ->where('service_done', 'Da')
                            ->get();

    }

   /**
    *
    *CREATE
    *
    */

    public static function createAppointment($patient_id, $doctor_id, $date, $term_id, $service_id, $tooth) {
        if(!PermissionService::checkPermission('appointmentModify')) throw new CustomException ('Nemate dozvolu za zakazivanje pregleda!');
        return AppointmentService::createAppointment( $patient_id, $doctor_id, $date, $term_id, $service_id, $tooth);
    }

    public static function assignmentPatient($patient, $dr){
        if(!PermissionService::checkPermission('assignmentPatient')) throw new CustomException ('Nemate dozvolu za dodeljivanje pacijenta!');
        $doctor =  Patient::find($patient);

        $doctor->doctor_id  = $dr;

        $doctor->save();

    }

    /**
     *
     * UPDATE
     *
     */

    public static function updateDoctor($name, $email, $id) {
        if(!PermissionService::checkPermission('userModify')) throw new CustomException ('Nemate dozvolu da izmenite podatke o doktoru!');
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
        if(!PermissionService::checkPermission('userModify')) throw new CustomException ('Nemate dozvolu da izbrisete doktora!');
        $doctor =  Doctor::find($id);

        $doctor->delete();
    }
}