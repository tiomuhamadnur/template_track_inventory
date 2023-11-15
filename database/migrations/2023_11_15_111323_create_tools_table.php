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
        Schema::create('tools', function (Blueprint $table) {
            $table->id();
            $table->string('name')->nullable();
            $table->string('code')->nullable();
            $table->bigInteger('departement_id')->unsigned()->nullable();
            $table->bigInteger('section_id')->unsigned()->nullable();
            $table->bigInteger('location_id')->unsigned()->nullable();
            $table->bigInteger('detail_location_id')->unsigned()->nullable();
            $table->integer('stock')->nullable();
            $table->string('unit')->nullable();
            $table->timestamps();

            $table->foreign('departement_id')->on('departement')->references('id');
            $table->foreign('section_id')->on('section')->references('id');
            $table->foreign('location_id')->on('location')->references('id');
            $table->foreign('detail_location_id')->on('detail_location')->references('id');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('tools');
    }
};
