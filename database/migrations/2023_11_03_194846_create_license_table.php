<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up()
    {
        Schema::create('license', function (Blueprint $table) {
            $table->id();
            $table->string('code')->unique();
            $table->date('expired_date')->nullable();
            $table->string('status')->nullable();
            $table->string('link')->nullable();
            $table->timestamps();
        });
    }

    public function down()
    {
        Schema::dropIfExists('license');
    }
};