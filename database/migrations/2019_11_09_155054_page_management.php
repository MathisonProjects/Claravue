<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class PageManagement extends Migration
{
    public function up() {
        Schema::create('pageManagement', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('key');
            $table->string('type');
            $table->string('title');
            $table->binary('data')->nullable();
            $table->softDeletes();
            $table->timestamps();
        });
    }

    public function down() {
        Schema::dropIfExists('pageManagement');
    }
}
