<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CmsModules extends Migration
{
    public function up()
    {
        Schema::create('cms_modules', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('name');
            $table->string('description');
            $table->binary('fields');
            $table->softDeletes();
            $table->timestamps();
        });

        Schema::create('cms_records', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->unsignedBigInteger('mid');
            $table->foreign('mid')->references('id')->on('cms_modules')->onDelete('cascade');
            $table->binary('data');
            $table->softDeletes();
            $table->timestamps();
        });
    }

    public function down()
    {
        Schema::dropIfExists('cms_modules');
        Schema::dropIfExists('cms_records');
    }
}
