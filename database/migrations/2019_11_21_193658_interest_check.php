<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class InterestCheck extends Migration
{
    public function up() {
        Schema::create('interestCheck', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->binary('data');
            $table->timestamps();
        });
    }

    public function down() {
        Schema::dropIfExists('interestCheck');
    }
}
