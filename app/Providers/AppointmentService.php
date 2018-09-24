<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use DB;
use App\Models\Appointment;

class AppointmentService extends ServiceProvider
{
    public static function getAppointments() {
        $appointments = DB::table('appoitments')
            ->join('users',     'appoitments.patient_id',       '=', 'users.id')
            ->join('admins',    'appoitments.doctor_id',        '=', 'admins.id')
            ->join('services',  'appoitments.service_id',       '=', 'services.id_service')
            ->join('terms',     'appoitments.term_id',          '=', 'terms.id_term')

            ->select('appoitments.*', 'users.name as user_name', 'admins.name as admin_name', 'services.service', 'services.price', 'terms.term')
            ->get();

          // dd($appointments);
        return $appointments;
    }

    public function primer() {
        $users = DB::table('users')
            ->join('contacts', 'users.id', '=', 'contacts.user_id')
            ->join('orders', 'users.id', '=', 'orders.user_id')
            ->select('users.*', 'contacts.phone', 'orders.price')
            ->get();
    }
}
