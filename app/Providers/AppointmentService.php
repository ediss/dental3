<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use App\Models\Appointment;

class AppointmentService extends ServiceProvider
{
    public static function getAppointments() {
        $appointments = Appointment::all();

        return $appointments;
    }

}
