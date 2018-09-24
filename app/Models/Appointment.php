<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Appointment extends Model
{
    protected $table = 'appointments';

    protected $dateFormat = 'd-M-Y';

    protected $dates = [
        'date_appoitment',
    ];

    public function getAppointmentDate($value) {
        return ucfirst($value);
    }

    public function setAppointmentDate($value) {
        $this->attributes['date_appoitment'] = ucfirst($value);
    }


}
