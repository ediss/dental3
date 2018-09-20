<?php

use Illuminate\Database\Seeder;

class AdminDataSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('admins')
            ->insert(
                [
                    'id'        =>  1,
                    'name'      =>  'Admin',
                    'email'     =>  'admin@gmail.com',
                    'password'  =>  Hash::make('admin123'),
                    'role_id'   =>  '1'
                ]
            );
    }
}
