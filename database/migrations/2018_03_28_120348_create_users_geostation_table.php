<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateUsersGeostationTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('users_geostations', function (Blueprint $table) {
            $table->increments('id');
            $table->unsignedInteger('user_id');
            $table->string('ip');
            $table->string('iso_code');
            $table->string('country');
            $table->string('city');
            $table->string('state');
            $table->string('state_name');
            $table->unsignedInteger('postal_code');
            $table->string('lat');
            $table->string('lon');
            $table->string('timezone');
            $table->string('continent');
            $table->string('currency');
            $table->boolean('default');
            $table->boolean('cached');
            $table->timestamps();
        });
    }

    public function down()
    {
        Schema::dropIfExists('users_geostations');
    }
}
