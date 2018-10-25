<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Payment extends Model {

    public $timestamps = false;

    protected $table = 'payments';

    protected $primaryKey = 'id_payment';

    protected $fillable = ['patient_id'];


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