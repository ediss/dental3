<?php

use Illuminate\Database\Seeder;

class UserDataSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('users')
        ->insert(
            [
                'id'        =>  1,
                'name'      =>  'User',
                'email'     =>  'user@gmail.com',
                'password'  =>  Hash::make('user123'),
            ]
        );
    }
}
