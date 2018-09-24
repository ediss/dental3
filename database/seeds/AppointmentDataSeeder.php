<?php

use Illuminate\Database\Seeder;

class AppointmentDataSeeder extends Seeder

{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $date = now();
        try {
            DB::table('appoitmentes')
            ->insert(
                [
                    'id_appoitment'     => 1  ,
                    //'date_appoitment'   => 1537813757,
                    'patient_id'        => '25',
                    'doctor_id'         => '2',
                    'term_id'           => '1',
                    'service_id'        => '1'
                ]
            );
        } catch (\Exception $e) {
            "Pregled pacijenta je vec unesen!";
        }

       /* try {
            DB::table('appoitments')
            ->insert(
                [
                    'id_appoitment'     => 2  ,
                  //  'date_appoitment'   => 'datum time stamp',
                    'patient_id'        => '23',
                    'doctor_id'         => '3',
                    'term_id'           => '2',
                    'service_id'        => '2'
                ]
            );
        } catch (\Exception $e) {
            "Pregled pacijenta je vec unesen!";
        }*/
    }
}
