<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up()
    {
        Schema::create('work_order', function (Blueprint $table) {
            $table->id();
            $table->bigInteger('job_id')->unsigned()->nullable();
            $table->string('nomor')->nullable();
            $table->date('tanggal_start')->nullable();
            $table->date('tanggal_close')->nullable();
            $table->string('description')->nullable();
            $table->string('status')->nullable();
            $table->timestamps();

            $table->foreign('job_id')->on('annual_planning')->references('id');
        });
    }

    public function down()
    {
        Schema::dropIfExists('work_order');
    }
};