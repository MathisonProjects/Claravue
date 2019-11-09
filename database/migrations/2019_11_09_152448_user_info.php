<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class UserInfo extends Migration
{
    public function up() {
        Schema::create('userInfo', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->integer('uid');
            $table->string('setting')
            $table->string('value')->nullable();
            $table->timestamps();
        });
    }

    public function down() {
        Schema::dropIfExists('userInfo');
    }
}
