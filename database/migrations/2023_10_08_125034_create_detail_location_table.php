<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up()
    {
        Schema::create('detail_location', function (Blueprint $table) {
            $table->id();
            $table->string('name')->nullable();
            $table->string('code')->nullable();
            $table->bigInteger('location_id')->unsigned()->nullable();
            $table->timestamps();

            $table->foreign('location_id')->on('location')->references('id');
        });
    }

    public function down()
    {
        Schema::dropIfExists('detail_location');
    }
};