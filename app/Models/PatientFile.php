<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class PatientFile extends Model
{
    public $timestamps = false;

    protected $table = 'patient_files';

    protected $primaryKey = 'id_patient_files';


}