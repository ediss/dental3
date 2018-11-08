<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use Illuminate\Support\Facades\Hash;
use App\Models\Admin;
use App\Models\DoctorPatient;
use App\Exceptions\CustomException;
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
    public static function createAdmin($name, $email, $password, $role_id) {
        if(!PermissionService::checkPermission('userModify')) throw new CustomException ('Nemate dozvolu da registgrujete novog korisnika!');
        $admin = new Admin;

        $admin->name     = $name;
        $admin->email    = $email;
        $admin->password = $password;
        $admin->role_id  = $role_id;

        $admin->save();
    }


    /**
     *
     * READ
     *
     */

    public static function getAdmins() {
        //ne zakucavaj role id
        return  Admin::where('role_id', '1')->paginate(5);
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
        if(!PermissionService::checkPermission('userModify')) throw new CustomException ('Nemate dozvolu da izmenite podatke o adminu!');

        $admin = Admin::find($id);

        $admin->name  = $name;
        $admin->email = $email;

        $admin->save();

        return $admin;
    }

    /**
     *
     * DELETE
     *
     */

    public static function deleteAdmin($id) {
        if(!PermissionService::checkPermission('userModify')) throw new CustomException ('Nemate dozvolu da izbrisete admina!');

        $admin =  Admin::find($id);

        $admin->delete();

        return $admin;
    }

}
