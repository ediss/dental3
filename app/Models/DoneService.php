<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class DoneService extends Model
{
    public $timestamps = false;

    protected $table = 'done_services';

    protected $primaryKey = 'id_done_services';


}