<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up()
    {
        Schema::table('joint', function (Blueprint $table) {
            $table->bigInteger('wesel_id')->unsigned()->after('line_id')->nullable();

            $table->foreign('wesel_id')->on('wesel')->references('id');
        });
    }

    public function down()
    {
        Schema::table('joint', function (Blueprint $table) {
            $table->dropColumn('wesel_id');
        });
    }
};
