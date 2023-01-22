<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up()
    {
        Schema::create('summary_temuan', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->bigInteger('mainline_id')->unsigned()->nullable();
            $table->bigInteger('part_id')->unsigned()->nullable();
            $table->bigInteger('detail_part_id')->unsigned()->nullable();
            $table->bigInteger('defect_id')->unsigned()->nullable();
            $table->enum('direction', ['L', 'R']);
            $table->string('no_sleeper')->nullable();
            $table->string('remark')->nullable();
            $table->string('klasifikasi')->nullable();
            $table->string('pic')->nullable();
            $table->date('tanggal')->nullable();
            $table->string('photo')->nullable();
            $table->enum('status', ['open', 'close'])->default('open');
            $table->timestamps();

            $table->foreign('mainline_id')->on('mainline')->references('id');
            $table->foreign('part_id')->on('part')->references('id');
            $table->foreign('detail_part_id')->on('detail_part')->references('id');
            $table->foreign('defect_id')->on('defect')->references('id');
        });
    }

    public function down()
    {
        Schema::dropIfExists('summary_temuan');
    }
};