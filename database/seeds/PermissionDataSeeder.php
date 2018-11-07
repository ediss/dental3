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
                    'id_permission'   =>  1,
                    'permission'      => 'appointmentModify',
                    'description'     => 'Zakazivanje pregleda',
                ]
            );
        } catch(\Exception $e) {
            echo "Dozvola 'roleModify' vec postoji!";
        }

        try{
            DB::table('permissions')
            ->insert(
                [
                    'id_permission'   =>  2,
                    'permission'      => 'roleModify',
                    'description'     => 'Unosenje, izmena i brisanje uloga u sistem,',
                ]
            );
        } catch(\Exception $e) {
            echo "Dozvola 'roleModify' vec postoji!";
        }

        try{
            DB::table('permissions')
            ->insert(
                [
                    'id_permission'   =>  3,
                    'permission'      => 'permissionModify',
                    'description'     => 'Unosenje izmena i brisanje dozvola za korisnike u sistemu',
                ]
            );
        } catch(\Exception $e) {
            echo "Dozvola 'permissionModify' vec postoji!";
        }

        try{
            DB::table('permissions')
            ->insert(
                [
                    'id_permission'   =>  4,
                    'permission'      => 'userModify',
                    'description'     => 'Unosenje, izmena i brisanje korisnika sistema',
                ]
            );
        } catch(\Exception $e) {
            echo "Dozvola 'userModify' vec postoji!";
        }

        try{
            DB::table('permissions')
            ->insert(
                [
                    'id_permission'   =>  5,
                    'permission'      => 'adminSidebar',
                    'description'     => 'Izgled menija za Admina',
                ]
            );
        } catch(\Exception $e) {
            echo "Dozvola 'adminSidebar' vec postoji!";
        }

        try{
            DB::table('permissions')
            ->insert(
                [
                    'id_permission'   =>  6,
                    'permission'      => 'registrationRead',
                    'description'     => 'Prikaz stavke "Registruj novog korisnika" u meniju',
                ]
            );
        } catch(\Exception $e) {
            echo "Dozvola 'registrationRead' vec postoji!";
        }

        try{
            DB::table('permissions')
            ->insert(
                [
                    'id_permission'   =>  7,
                    'permission'      => 'userRead',
                    'description'     => 'Prikaz stavke "Upravljaj korisnicima" u meniju',
                ]
            );
        } catch(\Exception $e) {
            echo "Dozvola 'userRead' vec postoji!";
        }

        try{
            DB::table('permissions')
            ->insert(
                [
                    'id_permission'   =>  8,
                    'permission'      => 'roleRead',
                    'description'     => 'Prikaz stavke "Upravljaj ulogama" u meniju',
                ]
            );
        } catch(\Exception $e) {
            echo "Dozvola 'roleRead' vec postoji!";
        }

        try{
            DB::table('permissions')
            ->insert(
                [
                    'id_permission'   =>  9,
                    'permission'      => 'permissionRead',
                    'description'     => 'Prikaz stavke "Upravljaj dozvolama" u meniju',
                ]
            );
        } catch(\Exception $e) {
            echo "Dozvola 'permissionRead' vec postoji!";
        }

        try{
            DB::table('permissions')
            ->insert(
                [
                    'id_permission'   =>  10,
                    'permission'      => 'appointmentRead',
                    'description'     => 'Prikaz stavke "Uvid u preglede" u meniju',
                ]
            );
        } catch(\Exception $e) {
            echo "Dozvola 'appointmentRead' vec postoji!";
        }

        try{
            DB::table('permissions')
            ->insert(
                [
                    'id_permission'   =>  11,
                    'permission'      => 'assignmentPatientRead',
                    'description'     => 'Prikaz stavke "Dodeli pacijente" u meniju',
                ]
            );
        } catch(\Exception $e) {
            echo "Dozvola 'assignmentPatientRead' već postoji!";
        }

        try{
            DB::table('permissions')
            ->insert(
                [
                    'id_permission'   =>  12,
                    'permission'      => 'doctorPatientsRead',
                    'description'     => 'Prikaz stavke "Moji pacijenti" u meniju',
                ]
            );
        } catch(\Exception $e) {
            echo "Dozvola 'assignmentPatientRead' već postoji!";
        }

        try{
            DB::table('permissions')
            ->insert(
                [
                    'id_permission'   =>  13,
                    'permission'      => 'makeAppointmentRead',
                    'description'     => 'Prikaz stavke "Zakaži pregled" u meniju',
                ]
            );
        } catch(\Exception $e) {
            echo "Dozvola 'makeAppointmentRead' već postoji!";
        }

        try{
            DB::table('permissions')
            ->insert(
                [
                    'id_permission'   =>  14,
                    'permission'      => 'rolePermissionModify',
                    'description'     => 'Dodeljivanje dozvola korisnicima(ulogama)',
                ]
            );
        } catch(\Exception $e) {
            echo "Dozvola 'rolePermissionModify' već postoji!";
        }

        try{
            DB::table('permissions')
            ->insert(
                [
                    'id_permission'   =>  15,
                    'permission'      => 'assignmentPatient',
                    'description'     => 'Dodeljivanje pacijenata doktorima',
                ]
            );
        } catch(\Exception $e) {
            echo "Dozvola 'assignmentPatient' već postoji!";
        }

        try{
            DB::table('permissions')
            ->insert(
                [
                    'id_permission'   =>  16,
                    'permission'      => 'paymentRead',
                    'description'     => 'Prikaz stavke u meniju "Uvid u plaćanja" namenjeno knjigovođi',
                ]
            );
        } catch(\Exception $e) {
            echo "Dozvola 'paymentRead' već postoji!";
        }

        try{
            DB::table('permissions')
            ->insert(
                [
                    'id_permission'   =>  17,
                    'permission'      => 'medicalHistoryRead',
                    'description'     => 'Uvid u karton pacijenta',
                ]
            );
        } catch(\Exception $e) {
            echo "Dozvola 'medicalHistoryRead' već postoji!";
        }


        try{
            DB::table('permissions')
            ->insert(
                [
                    'id_permission'   =>  18,
                    'permission'      => 'done_appointment',
                    'description'     => 'Dodavanje informacija o dolasku pacijenta na pregled',
                ]
            );
        } catch(\Exception $e) {
            echo "Dozvola 'done_appointment' već postoji!";
        }

        try{
            DB::table('permissions')
            ->insert(
                [
                    'id_permission'   =>  19,
                    'permission'      => 'paid_appointment',
                    'description'     => 'Dodavanje informacije da li je pacijent platio pregled',
                ]
            );
        } catch(\Exception $e) {
            echo "Dozvola 'paid_appointment' već postoji!";
        }
    }
}
