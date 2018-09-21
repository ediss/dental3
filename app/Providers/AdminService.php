<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;

class AdminService extends ServiceProvider
{
    /**
     * Function for adding new admin users
     *
     * @param string    $name       admin name
     * @param string    $email      admin email
     * @param string    $password   admin password
     * @return void
     */
    public static function createAdmin($name, $email, $password, $role){
        $admin = new Admin;

        $admin->name = $name;
        $admin->email = $email;
        $admin->password = Hash::make($password);
        $admin->role = $role;

        $admin->save();

    }
}
