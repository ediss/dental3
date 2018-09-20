<?php

namespace App\Providers;

use Illuminate\Support\Facades\Hash;
use App\Models\User;

class UserService {

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
        $user->password = Hash::make($password);

        $user->save();
        $id = $user->id;

        return $id;
    }
}
