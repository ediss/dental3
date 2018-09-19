<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class AddTablePayments extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('payments', function (Blueprint $table) {
            $table->increments('id_payment');
            $table->timestamp('date_payment');
            $table->tinyInteger('paid')->unsigned();
            $table->integer('patient_id')->unsigned();
            $table->integer('service_id')->unsigned();

            $table->foreign('patient_id')->references('id')->on('users');
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
        Schema::dropIfExists('payments');
    }
}
