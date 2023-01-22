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
        Schema::create('mainline', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->bigInteger('area_id')->unsigned();
            $table->bigInteger('line_id')->unsigned();
            $table->string('no_span')->nullable();
            $table->string('kilometer')->nullable();
            $table->string('panjang_span')->nullable();
            $table->string('jumlah_sleeper')->nullable();
            $table->string('spacing_sleeper')->nullable();
            $table->string('jenis_sleeper')->nullable();
            $table->string('joint')->nullable();
            $table->string('no_project')->nullable();
            $table->timestamps();

            $table->foreign('area_id')->on('area')->references('id');
            $table->foreign('line_id')->on('line')->references('id');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('mainline');
    }
};