<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class DoctorPatient extends Model
{
    public $timestamps = false;

    protected $table = 'doctor_patients';

    public function doctor() {
        return $this->belongsTo('App\Models\Admin', 'doctor_id', 'id');
    }

    public function patient() {
        return $this->belongsTo('App\Models\USer', 'patient_id', 'id');
    }

}
