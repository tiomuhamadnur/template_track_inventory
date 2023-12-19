<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up()
    {
        Schema::create('alarms', function (Blueprint $table) {
            $table->id();
            $table->string('title')->nullable();
            $table->string('day')->nullable();
            $table->string('time')->nullable();
            $table->string('endpoint')->nullable();
            $table->string('description')->nullable();
            $table->timestamps();
        });
    }

    public function down()
    {
        Schema::dropIfExists('alarms');
    }
};