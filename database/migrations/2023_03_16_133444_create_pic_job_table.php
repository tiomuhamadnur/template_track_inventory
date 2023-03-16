<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up()
    {
        Schema::create('pic_job', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->integer('user_id')->unsigned()->nullable();
            $table->bigInteger('job_id')->unsigned()->nullable();
            $table->integer('progress')->nullable();
            $table->year('tahun')->nullable();
            $table->timestamps();

            $table->foreign('user_id')->on('users')->references('id');
            $table->foreign('job_id')->on('annual_planning')->references('id');
        });
    }

    public function down()
    {
        Schema::dropIfExists('pic_job');
    }
};