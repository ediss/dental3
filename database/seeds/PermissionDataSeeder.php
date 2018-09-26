<?php

use Illuminate\Database\Seeder;

class PermissionDataSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        try{
            DB::table('permissions')
            ->insert(
                [
                    'id_permission'   =>  2,
                    'permission'      => 'roleModify',
                    'description'     => 'Create, Read, Update, Delete options for roles ',
                ]
            );
        } catch(\Exception $e) {
            echo "Dozvola 'roleModify' vec postoji!";
        }
    }
}
