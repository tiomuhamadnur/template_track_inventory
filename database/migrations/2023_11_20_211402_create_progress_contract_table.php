<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up()
    {
        Schema::create('progress_contract', function (Blueprint $table) {
            $table->id();
            $table->bigInteger('contract_id')->unsigned()->nullable();
            $table->string('termin')->nullable();
            $table->string('description')->nullable();
            $table->bigInteger('paid_value')->nullable();
            $table->dateTime('tanggal_paid')->nullable();
            $table->string('status')->nullable();
            $table->timestamps();

            $table->foreign('contract_id')->on('contract')->references('id');
        });
    }

    public function down()
    {
        Schema::dropIfExists('progress_contract');
    }
};