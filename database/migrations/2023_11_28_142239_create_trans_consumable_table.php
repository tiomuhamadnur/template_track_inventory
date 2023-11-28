<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up()
    {
        Schema::create('trans_consumable', function (Blueprint $table) {
            $table->id();
            $table->integer('user_id')->unsigned();
            $table->integer('responsible_id')->unsigned()->nullable();
            $table->bigInteger('consumable_id')->unsigned();
            $table->dateTime('tanggal_pinjam')->nullable();
            $table->dateTime('tanggal_kembali')->nullable();
            $table->integer('qty')->nullable();
            $table->string('status')->nullable();
            $table->string('remark')->nullable();

            $table->foreign('user_id')->on('users')->references('id');
            $table->foreign('responsible_id')->on('users')->references('id');
            $table->foreign('consumable_id')->on('consumable')->references('id');
            $table->timestamps();
        });
    }

    public function down()
    {
        Schema::dropIfExists('trans_consumable');
    }
};
