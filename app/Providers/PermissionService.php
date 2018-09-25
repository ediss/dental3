<?php

namespace App\Providers;

use App\Models\Permission;
use App\Models\RolePermissions;
use App\Providers\AdminService;

class PermissionService {

    public static function checkPermission($machine_name) {
        $admin = AdminService::getCurrentAdmin();
        $return = false;
        
        if(!empty($admin)) {
            $permission = Permission::
                join('role_permissions', 'permissions.id_permission', '=', 'role_permissions.permission_id')
                ->where('permissions.permission', '=', $machine_name)
                ->where('role_permissions.role_id', '=', $admin->role_id)
                ->get()
            ;
            
            if (!$permission->isEmpty()) $return = true;
        }

        return $return;
    }

    /**
     * 
     * READ
     * 
     */

    public static function getPermissions() {
        $permissions = Permission::all();

        return $permissions;
    }

    /**
     * 
     * CREATE
     * 
     */

    public static function createPermission($name, $description) {
        $permission = new Permission;

        $permission->permission  = $name;
        $permission->description = $description;

        $permission->save();
    }

    public static function addPermissionToRole($role_id, $permission_id) {
        $permission = new RolePermissions;

        $permission->role_id        = $role_id;
        $permission->permission_id  = $permission_id;

        $permission->save();
    }

    /**
     * 
     * UPDATE
     * 
     */

    public static function editPermission($name, $description) {
        //
    }
    
}
