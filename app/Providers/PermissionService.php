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

    public static function editPermission($id_permission) {
        //if(!PermissionService::checkPermission('permissionModify')) throw new \Exception('Nemate dozvolu za izmenu dozvole!');

        return  Permission::find($id_permission);

    }



    public static function updatePermission($permission_name, $description, $id_permission) {
        //if(!PermissionService::checkPermission('permissionModify')) throw new \Exception('Nemate dozvolu za izmenu dozvole!');

        $permission = Permission::find($id_permission);

        $permission->permission   = $permission_name;
        $permission->description  = $description;

        
        $permission->save();
    }


    /**
     * 
     * DELETE
     * 
     */

    public static function deletePermission($id_permission) {
      //  if(!PermissionService::checkPermission('roleModify')) throw new \Exception('Nemate dozvolu da izbrisete ulogu!');

        $permission = Permission::find($id_permission);

        $permission->delete();

     }


}
