<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class TodoTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('Todo_Projects', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('Name', 100);
            $table->binary('Description')->nullable();
            $table->timestamps();
        });

        Schema::create('Todo_Categories', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->bigInteger('ProjectId');
            $table->string('Name', 100);
            $table->binary('Description')->nullable();
            $table->timestamps();
        });

        Schema::create('Todo_Tasks', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->bigInteger('CategoryId')->nullable();
            $table->string('Name', 100);
            $table->binary('Description')->nullable();
            $table->bigInteger('SubtaskOf')->nullable();
            $table->integer('Status')->default(0); // 0 = Not Started, 1 = In Progress, 2 = Blocker, 3 = Complete
            $table->timestamps();
        });


    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('Todo_Projects');
        Schema::dropIfExists('Todo_Categories');
        Schema::dropIfExists('Todo_Tasks');
    }
}
