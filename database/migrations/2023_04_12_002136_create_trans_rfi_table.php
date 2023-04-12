<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up()
    {
        Schema::create('trans_rfi', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->integer('user_id')->unsigned()->nullable();
            $table->bigInteger('temuan_mainline_id')->unsigned()->nullable();
            $table->bigInteger('temuan_depo_id')->unsigned()->nullable();
            $table->date('tanggal')->nullable();
            $table->string('status')->nullable();
            $table->string('remark')->nullable();
            $table->string('photo')->nullable();
            $table->timestamps();

            $table->foreign('user_id')->on('users')->references('id');
            $table->foreign('temuan_mainline_id')->on('summary_temuan')->references('id');
            $table->foreign('temuan_depo_id')->on('summary_temuan_depo')->references('id');
        });
    }

    public function down()
    {
        Schema::dropIfExists('trans_rfi');
    }
};