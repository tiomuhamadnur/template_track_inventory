<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up()
    {
        Schema::create('buffer_stop_examination', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->bigInteger('buffer_stop_id')->unsigned()->nullable();
            $table->string('pic')->nullable();
            $table->date('tanggal')->nullable();
            $table->string('remark')->nullable();
            $table->string('photo')->nullable();
            $table->string('visual')->nullable();
            $table->string('visual_remark')->nullable();
            $table->string('quantity')->nullable();
            $table->string('quantity_remark')->nullable();
            $table->string('position')->nullable();
            $table->string('position_remark')->nullable();
            $table->string('torque')->nullable();
            $table->string('torque_remark')->nullable();
            $table->timestamps();

            $table->foreign('buffer_stop_id')->on('buffer_stop')->references('id');
        });
    }

    public function down()
    {
        Schema::dropIfExists('buffer_stop_examination');
    }
};