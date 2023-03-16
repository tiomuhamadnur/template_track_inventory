<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up()
    {
        Schema::create('annual_planning', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('name')->nullable();
            $table->string('item')->nullable();
            $table->string('detail')->nullable();
            $table->string('frekuensi')->nullable();
            $table->string('scope')->nullable();
            $table->timestamps();
        });
    }

    public function down()
    {
        Schema::dropIfExists('annual_planning');
    }
};
