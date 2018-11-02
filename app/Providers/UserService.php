<?php

namespace App\Providers;

use Illuminate\Support\Facades\Hash;
use App\Models\User as Patient;
use App\Models\Appointment;
use App\Models\Payment;
use App\Models\PatientFile;
use App\Exceptions\CustomException;

use Session;

class UserService {


    /**
     *
     * CREATE
     *
     */

    /**
     * Function for adding new user
     *
     * @param string    $name       user name
     * @param string    $email      user email
     * @param string    $password   user password
     * @return void
     */
    public static function createUser($name, $email, $password, $gender, $birthday) {
        if(!PermissionService::checkPermission('userModify')) throw new CustomException ('Nemate dozvolu da dodate pacijenta!');

        $patient = new Patient;

        $patient->name          = $name;
        $patient->email         = $email;
        $patient->password      = $password;
        $patient->gender        = $gender;
        $patient->date_of_birth = $birthday;

        $patient->save();
        $id = $patient->id;

        return $id;
    }

    public static function uploadPatientFile($file, $patient_id) {
        $patient_files = new PatientFile;

        $patient_files->img_src     = $file;
        $patient_files->patient_id  = $patient_id;

        $patient_files->save();

        return Session::flash('success', 'Uspesno ste dodali dokument za pacijenta!');

    }

    /**
     *
     * READ
     *
     */

     public static function getUsers() {
        // return User::all();
         return Patient::select('id as patient_id', 'name as patient_name', 'doctor_id', 'email')->get();

     }

     public static function getUnassignedUsers() {
         return Patient::whereNull('doctor_id')->get();
     }

     /**
      * Geting doctor of patient
      *
      *
      */
     public static function getPatientDoctor($id) {
        $doktor = Patient::find($id);

        return $doktor->doctor_id;
     }

    public static function getPatientAppointments($patient_id) {
        //$patientAppointments = Appointment::find($id);
        return  Appointment::where('patient_id', $patient_id)->get();
    }

    public static function getPatientFiles($patient_id) {
        return PatientFile::where('patient_id', $patient_id)->get();
    }

     /**
      *
      *EDIT
      *
      */

    public static function editUser($id) {
        return  Patient::find($id);
    }

    public static function updateUser($name, $email, $id) {
        if(!PermissionService::checkPermission('userModify')) throw new CustomException ('Nemate dozvolu da izmenite podatke o pacijentu!');
        $patient = Patient::find($id);

        $patient->name  = $name;
        $patient->email = $email;

        $patient->save();
    }


    /**
     *
     * DELETE
     *
     */

    public static function deleteUser($id) {
        if(!PermissionService::checkPermission('userModify')) throw new CustomException ('Nemate dozvolu da obrisete pacijenta!');

        $patient =  Patient::find($id);

        $patient->delete();
    }

}
