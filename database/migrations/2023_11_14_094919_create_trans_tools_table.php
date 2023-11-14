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
        Schema::create('trans_tools', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->bigInteger('location_id')->unsigned()->nullable();
            $table->bigInteger('detail_location_id')->unsigned()->nullable();
            $table->bigInteger('tools_id')->unsigned()->nullable();
            $table->timestamps();

            $table->foreign('location_id')->on('location')->references('id');
            $table->foreign('detail_location_id')->on('detail_location')->references('id');
            $table->foreign('tools_id')->on('tools')->references('id');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('trans_tools');
    }
};
