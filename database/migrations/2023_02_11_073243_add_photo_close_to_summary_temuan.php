<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up()
    {
        Schema::table('summary_temuan', function (Blueprint $table) {
            $table->string('photo_close')->after('photo')->nullable();
        });
    }

    public function down()
    {
        Schema::table('summary_temuan', function (Blueprint $table) {
            $table->dropColumn('photo_close');
        });
    }
};
