<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up()
    {
        Schema::create('trans_tools_materials', function (Blueprint $table) {
            $table->id();
            $table->bigInteger('tools_id')->unsigned()->nullable();
            $table->string('qty')->nullable();
            $table->string('initial_check')->nullable();
            $table->string('ending_check')->nullable();
            $table->string('remark')->nullable();
            $table->timestamps();

            $table->foreign('tools_id')->on('tools_materials')->references('id');
        });
    }

    public function down()
    {
        Schema::dropIfExists('trans_tools_materials');
    }
};