<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up()
    {
        Schema::create('accelerometer', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->bigInteger('area_id')->unsigned();
            $table->bigInteger('line_id')->unsigned()->nullable();
            $table->bigInteger('jadwal_id')->unsigned()->nullable();
            $table->string('sumbu_x')->nullable();
            $table->string('sumbu_y')->nullable();
            $table->string('sumbu_z')->nullable();
            $table->date('tanggal')->nullable();
            $table->string('pic')->nullable();
            $table->string('photo')->nullable();
            $table->timestamps();

            $table->foreign('area_id')->on('area')->references('id');
            $table->foreign('line_id')->on('line')->references('id');
            $table->foreign('jadwal_id')->on('jadwal_accelerometer')->references('id');
        });
    }

    public function down()
    {
        Schema::dropIfExists('accelerometer');
    }
};
