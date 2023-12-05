<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up()
    {
        Schema::create('consumable', function (Blueprint $table) {
            $table->id();
            $table->string('name')->nullable();
            $table->string('code')->nullable();
            $table->integer('stock')->nullable();
            $table->integer('safety_stock')->nullable();
            $table->string('unit')->nullable();
            $table->bigInteger('location_id')->unsigned()->nullable();
            $table->bigInteger('detail_location_id')->unsigned()->nullable();
            $table->string('photo')->nullable();
            $table->date('tgl_beli')->nullable();
            $table->date('tgl_sertifikasi')->nullable();
            $table->date('tgl_expired')->nullable();
            $table->string('vendor')->nullable();
            $table->string('description')->nullable();
            $table->timestamps();

            $table->foreign('location_id')->on('location')->references('id');
            $table->foreign('detail_location_id')->on('detail_location')->references('id');
        });
    }

    public function down()
    {
        Schema::dropIfExists('consumable');
    }
};