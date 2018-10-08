<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use Illuminate\Support\Facades\Hash;
use App\Models\Admin;
use App\Models\DoctorPatient;
use Illuminate\Support\Facades\Auth;

class AdminService extends ServiceProvider
{

    /**
     *
     * CREATE
     *
     */


    /**
     * Function for adding new admin users
     *
     * @param string    $name       admin name
     * @param string    $email      admin email
     * @param string    $password   admin password
     * @return void
     */
    public static function createAdmin($name, $email, $password, $role_id){
        $admin = new Admin;

        $admin->name     = $name;
        $admin->email    = $email;
        $admin->password = $password;
        $admin->role_id  = $role_id;

        $admin->save();
    }

    /*public static function assigmentPatient($patient, $dr){
        $doctor = new DoctorPatient;

        $doctor->patient_id = $patient;
        $doctor->doctor_id  = $dr;

        $doctor->save();

    }*/

    /**
     *
     * READ
     *
     */

    public static function getAdmins() {
        return  Admin::where('role_id', '1')->get();
    }

    /**
     * Get's current admin
     *
     * @return  Admin
     */
    public static function getCurrentAdmin() {
        return Auth::guard('admin')->user();
    }


    /**
     *
     * UPDATE
     *
     */

    public static function updateAdmin($name, $email, $id) {
        if(!PermissionService::checkPermission('userModify')) throw new \Exception('Nemate dozvolu da izmenite podatke o adminu!');

        $admin = Admin::find($id);

        $admin->name  = $name;
        $admin->email = $email;

        $admin->save();
    }

    /**
     *
     * DELETE
     *
     */

    public static function deleteAdmin($id) {
        if(!PermissionService::checkPermission('userModify')) throw new \Exception('Nemate dozvolu da izbrisete admina!');

        $admin =  Admin::find($id);

        $admin->delete();
    }

}
