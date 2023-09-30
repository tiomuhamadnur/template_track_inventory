<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up()
    {
        Schema::create('trans_civil_rfi', function (Blueprint $table) {
            $table->id();
            $table->integer('user_id')->unsigned()->nullable();
            $table->bigInteger('temuan_visual_id')->unsigned()->nullable();
            $table->date('tanggal')->nullable();
            $table->string('status')->nullable();
            $table->string('remark')->nullable();
            $table->string('photo')->nullable();
            $table->timestamps();

            $table->foreign('user_id')->on('users')->references('id');
            $table->foreign('temuan_visual_id')->on('tbl_civil_temuan_visual')->references('id');
        });
    }

    public function down()
    {
        Schema::dropIfExists('trans_civil_rfi');
    }
};