<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class DoctorPatient extends Model
{
    public $timestamps = false;

    protected $table = 'doctor_patients';

    protected $primaryKey = 'id_doctor_patients';


    public function doctor() {
        //return $this->belongsTo('App\Models\Admin', 'doctor_id', 'id');
        return $this->hasMany('App\Models\User');
    }

    public function patient() {
        return $this->hasOne('App\Models\Admin');
    }

}
