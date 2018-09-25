<?php

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        
        $this->call([
            RoleDataSeeder::class,
            UserDataSeeder::class,
            AdminDataSeeder::class,
            TermDataSeeder::class,
            AppointmentDataSeeder::class,
            ServiceDataSeeder::class,
        ]);
    }
}
