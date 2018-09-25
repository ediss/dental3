<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class AddTableUserSetRoles extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('user_set_roles', function (Blueprint $table) {
            $table->increments('id_user_set_roles');
            $table->integer('role_id')->unsigned();
            $table->integer('set_role_id')->unsigned();

            $table->foreign('role_id')->references('id_role')->on('roles');
            $table->foreign('set_role_id')->references('id_role')->on('roles');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('user_set_roles');
    }
}
