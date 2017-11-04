<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateUsercenterTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('usercenter', function (Blueprint $table) {
            $table->increments('id');
            $table->string('uid');
            $table->string('mycar');
            $table->string('order');
            $table->string('coupon');
            $table->string('integral');
            $table->string('collection');
            $table->string('reservation');
            $table->string('message');
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
        Schema::dropIfExists('usercenter');
    }
}
