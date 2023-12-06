<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up()
    {
        Schema::table('users', function (Blueprint $table) {
            $table->bigInteger('section_id')->unsigned()->nullable();
            $table->bigInteger('departement_id')->unsigned()->nullable();
            $table->bigInteger('vendor_id')->unsigned()->nullable();
            $table->string('no_hp')->nullable();
            $table->string('status_employee')->nullable();

            $table->foreign('section_id')->on('section')->references('id');
            $table->foreign('departement_id')->on('departement')->references('id');
            $table->foreign('vendor_id')->on('vendor')->references('id');
        });
    }

    public function down()
    {
        Schema::table('users', function (Blueprint $table) {
            $table->dropColumn('section_id');
            $table->dropColumn('departement_id');
            $table->dropColumn('vendor_id');
            $table->dropColumn('no_hp');
            $table->dropColumn('status_employee');
        });
    }
};