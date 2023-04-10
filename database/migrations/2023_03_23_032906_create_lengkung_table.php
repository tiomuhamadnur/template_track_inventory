<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up()
    {
        Schema::create('lengkung', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->bigInteger('area_id')->unsigned();
            $table->bigInteger('line_id')->unsigned();
            $table->string('name')->nullable();
            $table->string('tipe')->nullable();
            $table->string('btc')->nullable();
            $table->string('bcc')->nullable();
            $table->string('ip')->nullable();
            $table->string('ecc')->nullable();
            $table->string('etc')->nullable();
            $table->string('radius')->nullable();
            $table->string('versin')->nullable();
            $table->string('cant')->nullable();
            $table->string('tcl')->nullable();
            $table->string('twist')->nullable();
            $table->timestamps();

            $table->foreign('area_id')->on('area')->references('id');
            $table->foreign('line_id')->on('line')->references('id');
        });
    }

    public function down()
    {
        Schema::dropIfExists('lengkung');
    }
};
