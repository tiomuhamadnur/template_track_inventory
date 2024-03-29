<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up()
    {
        Schema::create('wesel', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->bigInteger('area_id')->unsigned()->nullable();
            $table->bigInteger('line_id')->unsigned()->nullable();
            $table->string('name')->nullable();
            $table->string('code')->nullable();
            $table->string('tipe')->nullable();
            $table->string('kilometer')->nullable();
            $table->timestamps();

            $table->foreign('area_id')->on('area')->references('id');
            $table->foreign('line_id')->on('line')->references('id');
        });
    }

    public function down()
    {
        Schema::dropIfExists('wesel');
    }
};
