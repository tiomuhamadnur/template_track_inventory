<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up()
    {
        Schema::create('jadwal_pekerjaan', function (Blueprint $table) {
            $table->id();
            $table->bigInteger('job_id')->unsigned()->nullable();
            $table->string('title')->nullable();
            $table->date('start')->nullable();
            $table->date('end')->nullable();
            $table->string('shift')->nullable();
            $table->string('color')->nullable();
            $table->string('location')->nullable();
            $table->string('description')->nullable();
            $table->string('url')->nullable();
            $table->string('section')->nullable();
            $table->timestamps();

            $table->foreign('job_id')->on('annual_planning')->references('id');
        });
    }

    public function down()
    {
        Schema::dropIfExists('jadwal_pekerjaan');
    }
};