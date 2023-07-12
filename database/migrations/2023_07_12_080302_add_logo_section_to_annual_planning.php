<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up()
    {
        Schema::table('annual_planning', function (Blueprint $table) {
            $table->string('section')->after('name')->nullable();
            $table->string('logo')->after('frekuensi')->nullable();
        });
    }

    public function down()
    {
        Schema::table('annual_planning', function (Blueprint $table) {
            $table->dropColumn('section');
            $table->dropColumn('logo');
        });
    }
};