<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateMycarsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('mycars', function (Blueprint $table) {
            $table->increments('id');
            $table->string('num');
            $table->string('literyear');
            $table->string('saleyear');
            $table->string('enginenum');
            $table->string('registration');
            $table->string('mails');
            $table->string('brand');
            $table->string('framenum');
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
        Schema::dropIfExists('mycars');
    }
}
