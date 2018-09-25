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
            DB::table('role_permissions')
            ->insert(
                [
                    'id_role_permission'   =>  1,
                    'role_id'              =>  2,
                    'permission_id'        =>  1
                ]
            );
        } catch(\Exception $e) {
            echo "Dozvola 'appointmentModify' vec postoji!";
        }
    }
}
