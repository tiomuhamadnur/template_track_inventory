<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('trans_defect', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->bigInteger('part_id')->unsigned()->nullable();
            $table->bigInteger('detail_part_id')->unsigned()->nullable();
            $table->bigInteger('defect_id')->unsigned()->nullable();
            $table->timestamps();

            $table->foreign('part_id')->on('part')->references('id');
            $table->foreign('detail_part_id')->on('detail_part')->references('id');
            $table->foreign('defect_id')->on('defect')->references('id');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('trans_defect');
    }
};