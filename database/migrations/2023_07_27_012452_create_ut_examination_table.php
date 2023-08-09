<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up()
    {
        Schema::create('ut_examination', function (Blueprint $table) {
            $table->id();
            $table->bigInteger('wo_id')->unsigned()->nullable();
            $table->bigInteger('joint_id')->unsigned()->nullable();
            $table->date('tanggal')->nullable();
            $table->string('dac')->nullable();
            $table->string('depth')->nullable();
            $table->string('length')->nullable();
            $table->string('status')->nullable();
            $table->string('remark')->nullable();
            $table->string('operator')->nullable();
            $table->timestamps();

            $table->foreign('wo_id')->on('work_order')->references('id');
            $table->foreign('joint_id')->on('joint')->references('id');
        });
    }

    public function down()
    {
        Schema::dropIfExists('ut_examination');
    }
};