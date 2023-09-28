<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up()
    {
        Schema::table('tbl_civil_temuan_visual', function (Blueprint $table) {
            $table->string('prioritas')->after('klasifikasi')->nullable();
        });
    }

    public function down()
    {
        Schema::table('tbl_civil_temuan_visual', function (Blueprint $table) {
            $table->dropColumn('prioritas');
        });
    }
};