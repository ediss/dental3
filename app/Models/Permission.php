<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;


class Permission extends Model
{
    public $timestamps = false;
    protected $dates = ['deleted_at'];

    protected $table = 'permissions';

    protected $primaryKey = 'id_permission';

    public function permissionsRoles() {
        return $this->belongsToMany('App\Models\Role', 'role_permissions', 'permission_id', 'role_id');
    }
}