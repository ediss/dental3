<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Payment extends Model {

    public $timestamps = false;

    protected $table = 'payments';

    protected $primaryKey = 'id_payment';

}