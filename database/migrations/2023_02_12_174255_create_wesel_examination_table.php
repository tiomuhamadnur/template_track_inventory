<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up()
    {
        Schema::create('wesel_examination', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->bigInteger('wesel_id')->unsigned()->nullable();
            $table->date('tanggal')->nullable();
            $table->string('pic')->nullable();

            // Track Gauge
            $table->string('TG_1')->nullable();
            $table->string('TG_2')->nullable();
            $table->string('TG_2A')->nullable();
            $table->string('TG_2AA')->nullable();
            $table->string('TG_3')->nullable();
            $table->string('TG_3A')->nullable();
            $table->string('TG_4A')->nullable();
            $table->string('TG_5')->nullable();
            $table->string('TG_5A')->nullable();
            $table->string('TG_6A')->nullable();
            $table->string('TG_7')->nullable();
            $table->string('TG_7A')->nullable();
            $table->string('TG_10')->nullable();
            $table->string('TG_10A')->nullable();

            // Cross Level
            $table->string('CL_1')->nullable();
            $table->string('CL_2')->nullable();
            $table->string('CL_2A')->nullable();
            $table->string('CL_2AA')->nullable();
            $table->string('CL_3')->nullable();
            $table->string('CL_3A')->nullable();
            $table->string('CL_4')->nullable();
            $table->string('CL_4A')->nullable();
            $table->string('CL_5')->nullable();
            $table->string('CL_5A')->nullable();
            $table->string('CL_7')->nullable();
            $table->string('CL_7A')->nullable();
            $table->string('CL_8')->nullable();
            $table->string('CL_8A')->nullable();
            $table->string('CL_10')->nullable();
            $table->string('CL_10A')->nullable();

            // Alignment
            $table->string('AL_2')->nullable();
            $table->string('AL_5')->nullable();
            $table->string('AL_5A_1per2')->nullable();
            $table->string('AL_5A_1per4')->nullable();
            $table->string('AL_5A_3per4')->nullable();
            $table->string('AL_9')->nullable();

            // Longitudinal Level
            $table->string('LL_2')->nullable();
            $table->string('LL_5')->nullable();
            $table->string('LL_5A')->nullable();
            $table->string('LL_9')->nullable();

            // Back Gauge
            $table->string('BG_8')->nullable();
            $table->string('BG_8A')->nullable();

            $table->string('photo')->nullable();
            $table->string('photo_2')->nullable();
            $table->string('photo_3')->nullable();
            $table->string('photo_4')->nullable();

            $table->timestamps();

            $table->foreign('wesel_id')->on('wesel')->references('id');
        });
    }

    public function down()
    {
        Schema::dropIfExists('wesel_examination');
    }
};