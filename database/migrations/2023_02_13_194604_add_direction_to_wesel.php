<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up()
    {
        Schema::table('wesel', function (Blueprint $table) {
            $table->string('direction')->after('tipe')->nullable();
        });
    }

    public function down()
    {
        Schema::table('wesel', function (Blueprint $table) {
            $table->dropColumn('direction');
        });
    }
};
