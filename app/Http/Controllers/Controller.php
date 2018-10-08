<?php

namespace App\Http\Controllers;

use Illuminate\Foundation\Bus\DispatchesJobs;
use Illuminate\Routing\Controller as BaseController;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
use App\Providers\PermissionService;
use App\Providers\RoleService;

class Controller extends BaseController
{
    use AuthorizesRequests, DispatchesJobs, ValidatesRequests;

    public static function response(string $view, array $data = null) {
        $parms                  =   [
            'data'              =>  $data,
            'readPermissions'   =>  PermissionService::getReadPermissions(),
            'roles'             =>  RoleService::getRoles(),
        ];

        return view($view, $parms);
    }
}
