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
        if(!PermissionService::checkPermission('roleModify')) throw new \Exception('Nemate dozvolu za dodavanje uloge!');

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
        return Role::all();
    }

    /**
     *
     * UPDATE
     *
     */


    public static function editRole($id_role) {
        if(!PermissionService::checkPermission('roleModify')) throw new \Exception('Nemate dozvolu za izmenu uloge!');

        return  Role::where('id_role', $id_role)->first();
    }


    public static function updateRole($role_name, $id_role) {
        if(!PermissionService::checkPermission('roleModify')) throw new \Exception('Nemate dozvolu za izmenu uloge!');

        $role = Role::find($id_role);

        $role->role  = $role_name;

        $role->save();
    }

    public static function addRoleToUser($user_id, $role_id) {
        //
    }

    /**
     *
     * DELETE
     *
     */

    public static function deleteRole($id_role) {
        if(!PermissionService::checkPermission('roleModify')) throw new \Exception('Nemate dozvolu da izbrisete ulogu!');

        $role = Role::find($id_role);

        $role->delete();

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
