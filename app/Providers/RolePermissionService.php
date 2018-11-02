<?php

namespace App\Providers;

use App\Models\RolePermissions;
use Session;

class RolePermissionService {


    /**
     *
     * CREATE
     *
     */

    public static function createRolePermission($permission, $role) {
        if(!PermissionService::checkPermission('rolePermissionModify')) throw new \Exception('Nemate dozvolu za dodavanje dozvole ulozi!');

        if (RolePermissions::where('role_id', '=', $role)
                           ->where('permission_id', '=', $permission)
                           ->exists()) {
           return Session::flash('error', 'Dozvola je vec dodeljena!');
         }

         else{
            $rolePermission = new RolePermissions;

            $rolePermission->role_id       = $role;
            $rolePermission->permission_id = $permission;

            $rolePermission->save();

            Session::flash('success', 'Uspesno ste dodali dozvolu ulozi!');
         }

    }

    /**
     *
     * READ
     *
     */

    public static function getAllRolePerimission() {
        RolePermissions::all();
    }

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
