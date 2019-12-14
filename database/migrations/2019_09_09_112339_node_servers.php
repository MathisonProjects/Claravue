<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class NodeServers extends Migration
{

    public function up()
    {
        Schema::create('NodeServers', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('name');
            $table->string('directory');
            $table->timestamps();
        });
    }

    public function down()
    {
        Schema::dropIfExists('NodeServers');
        
    }
}
