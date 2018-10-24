<?php

namespace App\Providers;

use Illuminate\Support\Facades\Hash;
use App\Models\User;
use App\Models\Appointment;

class UserService {


    protected $table = 'users';

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
    public static function createUser($name, $email, $password){
        $user = new User;

        $user->name = $name;
        $user->email = $email;
        $user->password = $password;

        $user->save();
        $id = $user->id;

        return $id;
    }

    /**
     *
     * READ
     *
     */

     public static function getUsers() {
         return User::all();
         //return User::select('id as patient_id', 'name as patient_name', 'doctor_id')->get();

     }

     public static function getUnassignedUsers() {
         return User::whereNull('doctor_id')->get();
     }

     /**
      * Geting doctor of patient
      *
      *
      */
     public static function getPatientDoctor($id) {
        $doktor = User::find($id);

        return $doktor->doctor_id;
     }

    public static function getPatientAppointments($patient_id) {
        //$patientAppointments = Appointment::find($id);
        return  Appointment::where('patient_id', $patient_id)->get();
    }
     /**
      *
      *EDIT
      *
      */

    public static function editUser($id) {
        return  User::find($id);
    }

    public static function updateUser($name, $email, $id) {
        if(!PermissionService::checkPermission('userModify')) throw new \Exception('Nemate dozvolu da izmenite podatke o pacijentu!');
        $user = User::find($id);

        $user->name  = $name;
        $user->email = $email;

        $user->save();
    }


    /**
     *
     * DELETE
     *
     */

    public static function deleteUser($id) {
        $user =  User::find($id);

        $user->delete();
    }

}
