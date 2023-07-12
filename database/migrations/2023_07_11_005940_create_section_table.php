<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up()
    {
        Schema::create('section', function (Blueprint $table) {
            $table->id();
            $table->bigInteger('departement_id')->unsigned()->nullable();
            $table->string('name')->nullable();
            $table->string('code')->nullable();
            $table->string('location')->nullable();
            $table->timestamps();

            $table->foreign('departement_id')->on('departement')->references('id');
        });
    }

    public function down()
    {
        Schema::dropIfExists('section');
    }
};