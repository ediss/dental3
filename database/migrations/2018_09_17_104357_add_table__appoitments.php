<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class AddTableAppoitments extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('appoitments', function (Blueprint $table) {
            $table->increments('id_appoitment');
            $table->date('date_appoitment');
            $table->integer('patient_id')->unsigned();
            $table->integer('doctor_id')->unsigned();
            $table->integer('term_id')->unsigned();
            $table->integer('service_id')->unsigned();
            $table->string('service_done')->nullable();

            $table->smallInteger('tooth')->unsigned();

            $table->foreign('patient_id')->references('id')->on('users');
            $table->foreign('doctor_id')->references('id')->on('admins');
            $table->foreign('term_id')->references('id_term')->on('terms');
            $table->foreign('service_id')->references('id_service')->on('services');

            $table->unique(['date_appoitment', 'doctor_id', 'term_id']);
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
