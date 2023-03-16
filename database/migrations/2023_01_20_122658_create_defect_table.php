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
        Schema::create('defect', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->bigInteger('detail_part_id')->unsigned()->nullable();
            $table->string('name')->nullable();
            $table->string('code')->nullable();
            $table->timestamps();

            $table->foreign('detail_part_id')->on('detail_part')->references('id');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('defect');
    }
};
