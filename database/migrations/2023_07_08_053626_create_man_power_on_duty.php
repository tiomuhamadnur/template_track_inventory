<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up()
    {
        Schema::create('man_power_on_duty', function (Blueprint $table) {
            $table->id();
            $table->integer('user_id')->unsigned()->nullable();
            $table->string('title')->nullable();
            $table->date('start')->nullable();
            $table->date('end')->nullable();
            $table->string('shift')->nullable();
            $table->string('section')->nullable();
            $table->string('color')->nullable();
            $table->string('url')->nullable();
            $table->timestamps();

            $table->foreign('user_id')->on('users')->references('id');
        });
    }

    public function down()
    {
        Schema::dropIfExists('man_power_on_duty');
    }
};