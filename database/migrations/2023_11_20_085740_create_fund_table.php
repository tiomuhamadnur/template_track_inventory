<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up()
    {
        Schema::create('fund', function (Blueprint $table) {
            $table->id();
            $table->string('name')->nullable();
            $table->string('kegiatan')->nullable();
            $table->bigInteger('init_value')->unsigned()->nullable();
            $table->bigInteger('current_value')->unsigned()->nullable();
            $table->year('tahun')->nullable();
            $table->timestamps();
        });
    }

    public function down()
    {
        Schema::dropIfExists('fund');
    }
};