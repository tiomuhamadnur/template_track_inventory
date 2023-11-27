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
        Schema::create('contract', function (Blueprint $table) {
            $table->id();
            $table->string('name')->nullable();
            $table->string('no_contract')->nullable();
            $table->string('vendor')->nullable();
            $table->bigInteger('fund_id')->unsigned()->nullable();
            $table->bigInteger('contract_value')->nullable();
            $table->bigInteger('section_id')->unsigned()->nullable();
            $table->bigInteger('departement_id')->unsigned()->nullable();
            $table->string('status')->nullable();
            $table->integer('approvedby_id')->unsigned()->nullable();
            $table->integer('user_id')->unsigned()->nullable();
            $table->string('remark')->nullable();
            $table->timestamps();


            $table->foreign('fund_id')->on('fund')->references('id');
            $table->foreign('approvedby_id')->on('users')->references('id');
            $table->foreign('user_id')->on('users')->references('id');
            $table->foreign('section_id')->on('section')->references('id');
            $table->foreign('departement_id')->on('departement')->references('id');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('contract');
    }
};
