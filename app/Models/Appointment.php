<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

<<<<<<< HEAD
class Appointment extends Model {

    protected $table = 'appoitments';

    protected $with = [
        'doctor',
        'patient',
        'term',
        'service',
    ];

    protected $dateFormat = 'd-mm-Y';
=======
class Appointment extends Model
{
    protected $table = 'appoitments';

    protected $dateFormat = 'U';
>>>>>>> 859247fd8e9d60c5b8f48629c39f3e7b126fca7c

    protected $dates = [
        'date_appoitment',
    ];

    public function getAppointmentDate($value) {
        return ucfirst($value);
    }

    public function getNameAttribute($value) {
        return strtoupper($value);
    }

<<<<<<< HEAD
    public function doctor() {
        return $this->belongsTo('App\Models\Admin', 'doctor_id', 'id');
    }
=======
    public function user() {
        return $this->belongsTo('App\Models\User', 'patient_id', 'id');
    }

    public function doctor() {
        return $this->belongsTo('App\Models\Admin', 'doctor_id', 'id');
    }

    public function term() {
        return $this->belongsTo('App\Models\Term', 'term_id', 'id_term');
    }


    public function service() {
        return $this->belongsTo('App\Models\Service', 'service_id', 'id_service');
    }
>>>>>>> 859247fd8e9d60c5b8f48629c39f3e7b126fca7c

    public function patient() {
        return $this->belongsTo('App\Models\User', 'patient_id', 'id');
    }

    public function term() {
        return $this->belongsTo('App\Models\Term', 'term_id', 'id_term');
    }

    public function service() {
        return $this->belongsTo('App\Models\Service', 'service_id', 'id_service');
    }
}
