<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up()
    {
        Schema::table('joint', function (Blueprint $table) {
            $table->bigInteger('mainline_id')->unsigned()->nullable()->after('wesel_id');
            $table->string('direction')->nullable()->after('kilometer');

            $table->foreign('mainline_id')->on('mainline')->references('id');
        });
    }

    public function down()
    {
        Schema::table('joint', function (Blueprint $table) {
            $table->dropColumn('mainline_id');
            $table->dropColumn('direction');
        });
    }
};