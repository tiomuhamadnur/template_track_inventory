<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up()
    {
        Schema::create('trans_civil_relasi_defect', function (Blueprint $table) {
            $table->id();
            $table->bigInteger('part_id')->unsigned()->nullable();
            $table->bigInteger('detail_part_id')->unsigned()->nullable();
            $table->bigInteger('defect_id')->unsigned()->nullable();
            $table->timestamps();

            $table->foreign('part_id')->on('tbl_civil_part')->references('id');
            $table->foreign('detail_part_id')->on('tbl_civil_detail_part')->references('id');
            $table->foreign('defect_id')->on('tbl_civil_defect')->references('id');
        });
    }

    public function down()
    {
        Schema::dropIfExists('trans_civil_relasi_defect');
    }
};