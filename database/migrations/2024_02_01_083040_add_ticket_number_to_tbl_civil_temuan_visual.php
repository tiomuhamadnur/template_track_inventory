<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up()
    {
        Schema::table('tbl_civil_temuan_visual', function (Blueprint $table) {
            $table->string('ticket_number')->unique()->nullable()->after('id');
        });
    }

    public function down()
    {
        Schema::table('tbl_civil_temuan_visual', function (Blueprint $table) {
            $table->dropColumn('ticket_number');
        });
    }
};