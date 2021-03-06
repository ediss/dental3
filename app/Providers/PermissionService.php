<?php

namespace App\Providers;

use App\Models\Permission;
use App\Models\RolePermissions;
use App\Providers\AdminService;
use Illuminate\Support\Facades\Auth;
use App\Exceptions\CustomException;
use Session;

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

    public static function getPermissions($select = null) {
        return !empty($select) ? array_column(Permission::select($select)->get()->toArray(), 'permission') : Permission::paginate(5);
    }

    public static function getAllPermissions() {
        return Permission::all();
    }

    /**
     * Get's all read permissions
     *
     * @return  array
     */
    public static function getReadPermissions() {
        $admin          =   AdminService::getCurrentAdmin();
        $permissions    =   [];

        if (!empty($admin)) {
            $permissions =array_column(Permission::
                join('role_permissions', 'permissions.id_permission', '=', 'role_permissions.permission_id')
                ->where('role_permissions.role_id', '=', $admin->role_id)
                ->where('permissions.permission', 'LIKE', "%Read%")
                ->select('permissions.permission')
                ->get()
                ->toArray()
                ,
                'permission'
            );
        }

        return $permissions;
    }

    public static function searchPermission($permission) {
        return Permission::where('description', 'LIKE', '%'.$permission.'%' )->orderBy('description', 'asc')->get();
    }

    /**
     *
     * CREATE
     *
     */

    public static function createPermission($name, $description) {
        if(!PermissionService::checkPermission('permissionModify')) throw new CustomException ('Nemate dozvolu za dodavanje dozvole!');
        $permission = new Permission;

        $permission->permission  = $name;
        $permission->description = $description;

        $permission->save();
    }

    public static function addPermissionToRole($role_id, $permission_id) {
        if(!PermissionService::checkPermission('permissionModify')) throw new CustomException ('Nemate dozvolu za dodeljivanje dozvole!');

        if (RolePermissions::where('role_id', '=', $role_id, 'permission_id', '=', $permission_id)->exists()) {
            echo "DOZVOLA JE VEC DODELJENA!";
         }

         else{
             echo "RADI DALJE!";
         }
        /*$permission = new RolePermissions;

        $permission->role_id        = $role_id;
        $permission->permission_id  = $permission_id;

        $permission->save();*/
    }

    /**
     *
     * UPDATE
     *
     */

   /* public static function editPermission($id_permission) {
        if(!PermissionService::checkPermission('permissionModify')) throw new CustomException ('Nemate dozvolu za izmenu dozvole!');

        return  Permission::find($id_permission);

    }
*/


    public static function updatePermission($description, $id_permission) {
       // if(!PermissionService::checkPermission('permissionModify')) throw new CustomException ('Nemate dozvolu za izmenu dozvole!');

        $permission = Permission::find($id_permission);

        $permission->description  = $description;

        $permission->save();
        return $permission;

    }


    /**
     *
     * DELETE
     *
     */

    public static function deletePermission($id_permission) {
        if(!PermissionService::checkPermission('permissionModify')) throw new CustomException ('Nemate dozvolu da izbrisete dozvolu!');

        $permission = Permission::find($id_permission);

        $permission->delete();

        return $permission;

     }


}
