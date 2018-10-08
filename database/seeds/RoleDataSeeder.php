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
        try{
            DB::table('roles')
            ->insert(
                [
                    'id_role'   =>  1,
                    'role'      =>  'Admin',
                ]
            );
        } catch(\Exception $e) {
            echo "Uloga 'Admin' vec postoji!";
        }

        try{
            DB::table('roles')
            ->insert(
                [
                    'id_role'   =>  2,
                    'role'      =>  'Doktor',
                ]
            );
        } catch(\Exception $e) {
            echo "Uloga 'Doktor' vec postoji!";
        }

        try{
            DB::table('roles')
            ->insert(
                [
                    'id_role'   =>  3,
                    'role'      =>  'Pacijent',
                ]
            );
        } catch(\Exception $e) {
            echo "Uloga 'Pacijent' vec postoji!";
        }

        try{
            DB::table('roles')
            ->insert(
                [
                    'id_role'   =>  4,
                    'role'      =>  'Asistent',
                ]
            );
        } catch(\Exception $e) {
            echo "Uloga 'Asistent' vec postoji!";
        }

        echo "Uspesno ste uneli uloge!";
    }
}
