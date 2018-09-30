<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class RolePermissions extends Model
{
    public $timestamps = false;

    protected $table = 'role_permissions';

    protected $primaryKey = 'id_role_permission';

}