<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class UserInfo extends Migration
{
    public function up() {
        Schema::create('pageManagement', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('key');
            $table->binary('setting')->nullable()
            $table->timestamps();
        });
    }

    public function down() {
        Schema::dropIfExists('pageManagement');
    }
}
