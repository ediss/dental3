<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use Illuminate\Support\Facades\Hash;
use App\Models\Admin;
use App\Models\User;

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

        $user->name     = $name;
        $user->email    = $email;
        $user->password = $password;

        $user->save();
        $id = $user->id;

        return $id;
    }

}
