<?php

namespace App\Providers;

use App\Models\Role;

class RoleService {
    

    /**
     * 
     * CREATE
     * 
     */
        
    public static function createRole($name_role) {
        $role = new Role;

        $role->role = $name_role;

        $role->save();
    }

    /**
     * 
     * READ
     * 
     */
    public static function getRoles() {
        $roles = Role::all();

        return $roles;
    }

    /**
     * 
     * UPDATE
     * 
     */

    
    public static function editRole($role_id) {
        //
    }

    public static function addRoleToUser($user_id, $role_id) {
        //
    }

    /**
     * 
     * DELETE
     * 
     */

     public static function deleteRole($role_id) {
         //
     }
     /*   kreiranje uloga
        dodeljivanje uloga
        brisanje uloga
        izmena naziva uloge

        listanje dozvola
        dodeljivanje dozvola ulozi
        izmena opisa dozvole

        PermissionService -> metoda checkPermision('ocekuje masinsko ime') u toj metodi dohvatam preko admin servisa trenutno priojavljenog admina(ako je prijavljen),
                    ako nije prijavljen, bacam exception, ako jeste pisem upit da li admin ima dozvolu za odredjenu akciju('masinsko ime');

     */




}
