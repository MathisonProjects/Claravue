<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class SiteManagement extends Migration
{
    public function up()
    {
        Schema::create('SiteManagement', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('name');
            $table->string('description');
            $table->binary('data');
            $table->timestamps();
        });
    }

    public function down()
    {
        Schema::dropIfExists('SiteManagement');
        
    }
}
