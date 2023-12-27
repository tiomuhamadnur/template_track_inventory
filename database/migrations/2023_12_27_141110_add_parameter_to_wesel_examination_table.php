<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up()
    {
        Schema::table('wesel_examination', function (Blueprint $table) {
            // Track Gauge
            $table->integer('TG_1A')->nullable();
            $table->integer('TG_4')->nullable();
            $table->integer('TG_8')->nullable();
            $table->integer('TG_8A')->nullable();

            // Cross Level
            $table->integer('CL_1A')->nullable();

            // Alignment
            $table->integer('AL_1')->nullable();
            $table->integer('AL_1A')->nullable();
            $table->integer('AL_3')->nullable();
            $table->integer('AL_3A')->nullable();
            $table->integer('AL_8')->nullable();
            $table->integer('AL_8A')->nullable();
            $table->integer('AL_10')->nullable();
            $table->integer('AL_10A')->nullable();

            // Longitudinal Level
            $table->integer('LL_1')->nullable();
            $table->integer('LL_1A')->nullable();
            $table->integer('LL_3')->nullable();
            $table->integer('LL_3A')->nullable();
            $table->integer('LL_8')->nullable();
            $table->integer('LL_8A')->nullable();
            $table->integer('LL_10')->nullable();
            $table->integer('LL_10A')->nullable();

            // Back Gauge
            $table->integer('BG_2')->nullable();
            $table->integer('BG_2A')->nullable();
            $table->integer('BG_5')->nullable();
            $table->integer('BG_5A')->nullable();
            $table->integer('BG_6')->nullable();
            $table->integer('BG_6A')->nullable();
            $table->integer('BG_9')->nullable();
            $table->integer('BG_9A')->nullable();

        });
    }

    public function down()
    {
        Schema::table('wesel_examination', function (Blueprint $table) {
            $table->dropColumn('TG_1A');
            $table->dropColumn('TG_4');
            $table->dropColumn('TG_8');
            $table->dropColumn('TG_8A');

            $table->dropColumn('CL_1A');

            $table->dropColumn('AL_1');
            $table->dropColumn('AL_1A');
            $table->dropColumn('AL_3');
            $table->dropColumn('AL_3A');
            $table->dropColumn('AL_8');
            $table->dropColumn('AL_8A');
            $table->dropColumn('AL_10');
            $table->dropColumn('AL_10A');

            $table->dropColumn('LL_1');
            $table->dropColumn('LL_1A');
            $table->dropColumn('LL_3');
            $table->dropColumn('LL_3A');
            $table->dropColumn('LL_8');
            $table->dropColumn('LL_8A');
            $table->dropColumn('LL_10');
            $table->dropColumn('LL_10A');

            $table->dropColumn('BG_2');
            $table->dropColumn('BG_2A');
            $table->dropColumn('BG_5');
            $table->dropColumn('BG_5A');
            $table->dropColumn('BG_6');
            $table->dropColumn('BG_6A');
            $table->dropColumn('BG_9');
            $table->dropColumn('BG_9A');
        });
    }
};