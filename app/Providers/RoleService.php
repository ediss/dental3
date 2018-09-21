<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use DB;
use App\Models\Role;

class RoleService extends ServiceProvider {

    public static function getRoles() {
        $roles = Role::all();

        return $roles;
    }
}
