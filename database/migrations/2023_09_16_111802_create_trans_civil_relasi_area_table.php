<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up()
    {
        Schema::create('trans_civil_relasi_area', function (Blueprint $table) {
            $table->id();
            $table->bigInteger('area_id')->unsigned()->nullable();
            $table->bigInteger('sub_area_id')->unsigned()->nullable();
            $table->bigInteger('detail_area_id')->unsigned()->nullable();
            $table->timestamps();

            $table->foreign('area_id')->on('area')->references('id');
            $table->foreign('sub_area_id')->on('tbl_civil_sub_area')->references('id');
            $table->foreign('detail_area_id')->on('tbl_civil_detail_area')->references('id');
        });
    }

    public function down()
    {
        Schema::dropIfExists('trans_civil_relasi_area');
    }
};