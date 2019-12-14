<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class MainMenu extends Migration
{
    public function up() {
        Schema::create('mainMenu', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('icon');
            $table->string('text');
            $table->string('type');
            $table->string('target');
            $table->integer('oid');
            $table->timestamps();
        });
    }

    public function down() {
        Schema::dropIfExists('mainMenu');
    }
}
