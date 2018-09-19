<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class AddTableDoneServices extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('done_services', function (Blueprint $table) {
            $table->increments('id_done_services');
            $table->timestamp('date');
            $table->integer('patient_id')->unsigned();
            $table->integer('term_id')->unsigned();
            $table->integer('doctor_id')->unsigned();
            $table->integer('service_id')->unsigned();

            $table->foreign('patient_id')->references('id')->on('users');
            $table->foreign('term_id')->references('id_term')->on('terms');
            $table->foreign('doctor_id')->references('id')->on('admins');
            $table->foreign('service_id')->references('id_service')->on('services');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('done_services');
    }
}
