<?php

use Illuminate\Database\Seeder;

class RoleDataSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('roles')
        ->insert(
            [
                'id_role'        =>  1,
                'role'      =>  'Admin',

            ],
            [
                'id_role'        =>  2,
                'role'      =>  'Doctor',

            ]
        );
    }
}
