<?php

use Illuminate\Database\Seeder;

class RolePermissionsDataSeeder extends Seeder
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
                    'id_role_permission'   => 2,
                    'role_id'              => 1,
                    'permission_id'        => 2,
                ]
            );
        } catch(\Exception $e) {
            echo "Dozvola 'roleModify' je vec dodeljena!";
        }
    }
}
