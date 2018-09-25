<?php

namespace App\Providers;

use App\Models\Role;

class RoleService {

    public static function getRoles() {
        $roles = Role::all();

        return $roles;
    }


    /**
     * 
     * CREATE
     * 
     */

     /*
        lsitanje uloga
        kreiranje uloga
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
