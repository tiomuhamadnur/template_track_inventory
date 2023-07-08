<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up()
    {
        Schema::table('jadwal_pekerjaan', function (Blueprint $table) {
            $table->string('nama_pekerjaan')->after('title')->nullable();
            $table->string('report')->after('section')->nullable();
        });
    }

    public function down()
    {
        Schema::table('jadwal_pekerjaan', function (Blueprint $table) {
            $table->dropColumn('nama_pekerjaan');
            $table->dropColumn('report');
        });
    }
};