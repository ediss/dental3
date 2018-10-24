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
                    'id_role_permission'   => 1,
                    'role_id'              => 1,
                    'permission_id'        => 1,
                ]
            );
        } catch(\Exception $e) {
            echo "Dozvola 'appointmentModify' je vec dodeljena!";
        }

        try{
            DB::table('role_permissions')
            ->insert(
                [
                    'id_role_permission'   => 2,
                    'role_id'              => 2,
                    'permission_id'        => 1,
                ]
            );
        } catch(\Exception $e) {
            echo "#";
        }

        try{
            DB::table('role_permissions')
            ->insert(
                [
                    'id_role_permission'   => 3,
                    'role_id'              => 1,
                    'permission_id'        => 2,
                ]
            );
        } catch(\Exception $e) {
            echo "#";
        }

        try{
            DB::table('role_permissions')
            ->insert(
                [
                    'id_role_permission'   => 4,
                    'role_id'              => 1,
                    'permission_id'        => 3,
                ]
            );
        } catch(\Exception $e) {
            echo "#";
        }

        try{
            DB::table('role_permissions')
            ->insert(
                [
                    'id_role_permission'   => 5,
                    'role_id'              => 1,
                    'permission_id'        => 4,
                ]
            );
        } catch(\Exception $e) {
            echo "#";
        }

        try{
            DB::table('role_permissions')
            ->insert(
                [
                    'id_role_permission'   => 6,
                    'role_id'              => 1,
                    'permission_id'        => 5,
                ]
            );
        } catch(\Exception $e) {
            echo "#";
        }


        try{
            DB::table('role_permissions')
            ->insert(
                [
                    'id_role_permission'   => 7,
                    'role_id'              => 1,
                    'permission_id'        => 6,
                ]
            );
        } catch(\Exception $e) {
            echo "#";
        }


        try{
            DB::table('role_permissions')
            ->insert(
                [
                    'id_role_permission'   => 8,
                    'role_id'              => 1,
                    'permission_id'        => 7,
                ]
            );
        } catch(\Exception $e) {
            echo "#";
        }


        try{
            DB::table('role_permissions')
            ->insert(
                [
                    'id_role_permission'   => 9,
                    'role_id'              => 1,
                    'permission_id'        => 8,
                ]
            );
        } catch(\Exception $e) {
            echo "#";
        }


        try{
            DB::table('role_permissions')
            ->insert(
                [
                    'id_role_permission'   => 10,
                    'role_id'              => 1,
                    'permission_id'        => 9,
                ]
            );
        } catch(\Exception $e) {
            echo "#";
        }


        try{
            DB::table('role_permissions')
            ->insert(
                [
                    'id_role_permission'   => 11,
                    'role_id'              => 1,
                    'permission_id'        => 10,
                ]
            );
        } catch(\Exception $e) {
            echo "#";
        }



        try{
            DB::table('role_permissions')
            ->insert(
                [
                    'id_role_permission'   => 12,
                    'role_id'              => 2,
                    'permission_id'        => 10,
                ]
            );
        } catch(\Exception $e) {
            echo "#";
        }



        try{
            DB::table('role_permissions')
            ->insert(
                [
                    'id_role_permission'   => 13,
                    'role_id'              => 1,
                    'permission_id'        => 11,
                ]
            );
        } catch(\Exception $e) {
            echo "#";
        }



        try{
            DB::table('role_permissions')
            ->insert(
                [
                    'id_role_permission'   => 14,
                    'role_id'              => 4,
                    'permission_id'        => 11,
                ]
            );
        } catch(\Exception $e) {
            echo "#";
        }



        try{
            DB::table('role_permissions')
            ->insert(
                [
                    'id_role_permission'   => 15,
                    'role_id'              => 2,
                    'permission_id'        => 12,
                ]
            );
        } catch(\Exception $e) {
            echo "#";
        }



        try{
            DB::table('role_permissions')
            ->insert(
                [
                    'id_role_permission'   => 16,
                    'role_id'              => 2,
                    'permission_id'        => 13,
                ]
            );
        } catch(\Exception $e) {
            echo "#";
        }



        try{
            DB::table('role_permissions')
            ->insert(
                [
                    'id_role_permission'   => 17,
                    'role_id'              => 4,
                    'permission_id'        => 13,
                ]
            );
        } catch(\Exception $e) {
            echo "#";
        }



        try{
            DB::table('role_permissions')
            ->insert(
                [
                    'id_role_permission'   => 18,
                    'role_id'              => 1,
                    'permission_id'        => 14,
                ]
            );
        } catch(\Exception $e) {
            echo "#";
        }



        try{
            DB::table('role_permissions')
            ->insert(
                [
                    'id_role_permission'   => 19,
                    'role_id'              => 1,
                    'permission_id'        => 15,
                ]
            );
        } catch(\Exception $e) {
            echo "#";
        }



        try{
            DB::table('role_permissions')
            ->insert(
                [
                    'id_role_permission'   => 20,
                    'role_id'              => 4,
                    'permission_id'        => 15,
                ]
            );
        } catch(\Exception $e) {
            echo "#";
        }
    }
}
