<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateCarsdatasTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('carsdatas', function (Blueprint $table) {
            $table->increments('id');
            $table->string('class');
            $table->string('price');
            $table->string('name');
            $table->string('brand');
            $table->string('colour');
            $table->string('model');
            $table->string('hot');
            $table->string('config');
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
        Schema::dropIfExists('carsdatas');
    }
}
