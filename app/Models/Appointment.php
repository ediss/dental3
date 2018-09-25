<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Appointment extends Model {

    protected $table = 'appoitments';

    protected $with = [
        'doctor',
        'patient',
        'term',
        'service',
    ];

    protected $dateFormat = 'd-mm-Y';

    protected $dates = [
        'date_appoitment',
    ];

    public function getAppointmentDate($value) {
        return ucfirst($value);
    }

    public function setAppointmentDate($value) {
        $this->attributes['date_appoitment'] = ucfirst($value);
    }

    public function doctor() {
        return $this->belongsTo('App\Models\Admin', 'doctor_id', 'id');
    }

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
