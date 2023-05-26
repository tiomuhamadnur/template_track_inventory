<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up()
    {
        Schema::create('tools_materials', function (Blueprint $table) {
            $table->id();
            $table->string('name')->nullable();
            $table->string('qty')->nullable();
            $table->string('unit')->nullable();
            $table->string('initial_check')->nullable();
            $table->string('ending_check')->nullable();
            $table->string('remark')->nullable();
            $table->timestamps();
        });
    }

    public function down()
    {
        Schema::dropIfExists('tools_materials');
    }
};
