<?php

namespace App\Providers;

use Illuminate\Support\Facades\Hash;
use App\Models\User;

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
