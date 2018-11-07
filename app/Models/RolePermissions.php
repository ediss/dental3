<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;


class RolePermissions extends Model
{
    public $timestamps = false;

    protected $table = 'role_permissions';

    protected $dates = ['deleted_at'];

    protected $primaryKey = 'id_role_permission';

}