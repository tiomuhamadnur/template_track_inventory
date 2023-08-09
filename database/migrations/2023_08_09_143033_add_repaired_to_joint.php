<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up()
    {
        Schema::table('joint', function (Blueprint $table) {
            $table->string('repaired')->after('direction')->nullable();
        });
    }

    public function down()
    {
        Schema::table('joint', function (Blueprint $table) {
            $table->dropColumn('repaired');
        });
    }
};