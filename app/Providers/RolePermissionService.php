<?php

namespace App\Providers;

use App\Models\RolePermissions;

class RolePermissionService {


    /**
     *
     * CREATE
     *
     */

    public static function createRolePermission($permission, $role) {
        //if(!PermissionService::checkPermission('roleModify')) throw new \Exception('Nemate dozvolu za dodavanje uloge!');

        $rolePermission = new RolePermissions;

        $rolePermission->role_id       = $role;
        $rolePermission->permission_id = $permission;

        $rolePermission->save();
    }

    /**
     *
     * READ
     *
     */

    /**
     *
     * UPDATE
     *
     */




    public static function addRoleToUser($user_id, $role_id) {
        //
    }

    /**
     *
     * DELETE
     *
     */

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
