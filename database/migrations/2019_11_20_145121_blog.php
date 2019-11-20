<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class Blog extends Migration
{
    public function up() {
        Schema::create('siteBlog', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->integer('pid');
            $table->timestamps();
        });
    }

    public function down() {
        Schema::dropIfExists('siteBlog');
    }
}
