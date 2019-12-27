<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class TaskCommentary extends Migration
{
    public function up()
    {
        Schema::create('taskCommentary', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->integer('uid');
            $table->integer('tid');
            $table->integer('tcid')->nullable(); // Allows nesting of comments
            $table->binary('comment');
            $table->timestamps();
        });
    }

    public function down()
    {
        Schema::dropIfExists('taskCommentary');
    }
}
