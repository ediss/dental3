<?php

namespace App\Providers;

use App\Models\Permission;
use App\Providers\AdminService;

class PermissionService {

    public static function checkPermission($machine_name) {
        $admin = AdminService::getCurentAdmin();
        $return = false;

        if(!empty($admin)) {
            $permission = Permission::
                join('role_permissions', 'permissions.id_permission', '=', 'role_permissions.permission_id')
                ->where('permissions.permission', '=', $machine_name)
                ->where('role_permissions.role_id', '=', $admin->role_id)
                ->get()
            ;

            if (!empty($permission)) $return = true;
        }

        return $return;
    }
}
