<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Appointment extends Model
{
    protected $table = 'appoitments';

    public $timestamps = false;

   protected $dateFormat = 'U';


    protected $primaryKey = 'id_appoitment';

    //protected $dateFormat = 'U';

    /*protected $dates = [
        'date_appoitment',
    ];*/

    public function getAppointmentDate($value) {
        return ucfirst($value);
    }

    public function getNameAttribute($value) {
        return strtoupper($value);
    }

    public function patient() {
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


}
