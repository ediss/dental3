<?php

namespace App\Providers;

use App\Models\Admin as Doctor;
use App\Models\DoctorPatient as Patients;
use App\Models\DoneService;

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
                ->select('users.name as patient_name', 'admins.name as doctor_name', 'users.id as patient_id')
                ->get();

       return $users;
    }

    public static function getDoctors() {

        return  Doctor::where('role_id', '2')->get();
    }

    public static function getCurrentDoctor() {
        return Auth::guard('admin')->user();
    }

    public static function getpatientMedicalHistory($patient_id){
        // select * from done_services where patient_id = $patient
        //probaj da uradis preko belong to (eloquent relationships)
        $patient =  DoneService::find($patient_id)->patient_id;

        return DoneService::join('users', 'patient_id', '=', 'users.id')
                ->join('admins',    'doctor_id', '=', 'admins.id')
                ->join('terms',     'term_id',  '=', 'terms.id_term')
                ->join('services',  'service_id',  '=', 'services.id_service')
                ->select('users.name as patient_name', 'date', 'admins.name as doctor_name', 'terms.term as term', 'services.service as service')
                ->where ('patient_id', $patient)
                ->get();

        //dd($service);
    }

   /**
    *
    *CREATE
    *
    */

    public static function createAppointment($patient_id, $doctor_id, $date, $term_id, $service_id) {
        return AppointmentService::createAppointment( $patient_id, $doctor_id, $date, $term_id, $service_id);
    }

    public static function assigmentPatient($patient, $dr){
        if(!PermissionService::checkPermission('appointmentModify')) throw new \Exception('Nemate dozbvolu za zakazivanje pregleda!');
        $doctor = new Patients;

        $doctor->patient_id = $patient;
        $doctor->doctor_id  = $dr;

        $doctor->save();

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