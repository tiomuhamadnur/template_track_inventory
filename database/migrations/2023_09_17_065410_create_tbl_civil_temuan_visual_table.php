<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up()
    {
        Schema::create('tbl_civil_temuan_visual', function (Blueprint $table) {
            $table->id();
            $table->bigInteger('area_id')->unsigned()->nullable();
            $table->bigInteger('sub_area_id')->unsigned()->nullable();
            $table->bigInteger('detail_area_id')->unsigned()->nullable();
            $table->bigInteger('part_id')->unsigned()->nullable();
            $table->bigInteger('detail_part_id')->unsigned()->nullable();
            $table->bigInteger('defect_id')->unsigned()->nullable();
            $table->string('klasifikasi')->nullable();
            $table->enum('status', ['open', 'monitoring', 'close'])->default('open');
            $table->string('remark')->nullable();
            $table->string('pic')->nullable();
            $table->date('tanggal')->nullable();
            $table->string('photo')->nullable();
            $table->string('pic_rfi')->nullable();
            $table->date('tanggal_rfi')->nullable();
            $table->string('pic_close')->nullable();
            $table->date('tanggal_close')->nullable();
            $table->string('photo_close')->nullable();
            $table->string('justifikasi')->nullable();
            $table->string('pic_justifikasi')->nullable();
            $table->string('eksekutor')->nullable();
            $table->timestamps();

            $table->foreign('area_id')->on('area')->references('id');
            $table->foreign('sub_area_id')->on('tbl_civil_sub_area')->references('id');
            $table->foreign('detail_area_id')->on('tbl_civil_detail_area')->references('id');
            $table->foreign('part_id')->on('tbl_civil_part')->references('id');
            $table->foreign('detail_part_id')->on('tbl_civil_detail_part')->references('id');
            $table->foreign('defect_id')->on('tbl_civil_defect')->references('id');
        });
    }

    public function down()
    {
        Schema::dropIfExists('tbl_civil_temuan_visual');
    }
};