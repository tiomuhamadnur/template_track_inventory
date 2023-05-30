<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up()
    {
        Schema::table('summary_temuan_depo', function (Blueprint $table) {
            $table->date('tanggal_rfi')->after('photo')->nullable();
            $table->string('pic_rfi')->after('tanggal_rfi')->nullable();
            $table->date('tanggal_close')->after('photo_close')->nullable();
        });
    }

    public function down()
    {
        Schema::table('summary_temuan_depo', function (Blueprint $table) {
            $table->dropColumn('tanggal_rfi');
            $table->dropColumn('pic_rfi');
            $table->dropColumn('tanggal_close');
        });
    }
};