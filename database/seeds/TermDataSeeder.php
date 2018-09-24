<?php

use Illuminate\Database\Seeder;

class TermDataSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        try {
            DB::table('terms')
            ->insert(
                [
                    'id_term'   => 1  ,
                    'term'      => '08:00-09:00'
                ]
            );
        } catch (\Exception $e) {
            "Termin je vec unesen!";
        }

        try {
            DB::table('terms')
            ->insert(
                [
                    'id_term'   => 2  ,
                    'term'      => '09:00-10:00'
                ]
            );
        } catch (\Exception $e) {
            "Termin je vec unesen!";
        }
    }
}
