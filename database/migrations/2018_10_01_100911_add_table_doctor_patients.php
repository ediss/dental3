<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class AddTableDoctorPatients extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('doctor_patients', function (Blueprint $table) {
            $table->increments('id_doctor_patients');
            $table->integer('patient_id')->unsigned();
            $table->integer('doctor_id')->unsigned();

            $table->foreign('patient_id')->references('id')->on('users');
            $table->foreign('doctor_id')->references('id')->on('admins');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('appoitments');
    }
}
