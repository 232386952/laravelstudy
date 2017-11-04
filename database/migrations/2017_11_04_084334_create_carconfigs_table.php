<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateCarconfigsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('carconfigs', function (Blueprint $table) {
            $table->increments('id');
            $table->string('models');
            $table->string('price');
            $table->string('size');
            $table->string('wheelbase');
            $table->string('hubs');
            $table->string('sparetire');
            $table->string('tank');
            $table->string('curbweight');
            $table->string('engine');
            $table->string('power');
            $table->string('torque');
            $table->string('gearbox');
            $table->string('supension');
            $table->string('brake');

            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('carconfigs');
    }
}
