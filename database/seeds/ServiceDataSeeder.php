<?php

use Illuminate\Database\Seeder;

class ServiceDataSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        try {
            DB::table('services')
            ->insert(
                [
                    'id_service'   => 1  ,
                    'service'      => 'Popravka zuba',
                    'price'        => '4000'
                ]
            );
        } catch (\Exception $e) {
            "Usluga je vec unesena!";
        }

        try {
            DB::table('services')
            ->insert(
                [
                    'id_service'   => 2  ,
                    'service'      => 'Uklanjanje kamenca',
                    'price'        => '2000'
                ]
            );
        } catch (\Exception $e) {
            "Usluga je vec unesena!";
        }
    }
}
