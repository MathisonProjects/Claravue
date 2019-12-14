<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class ApiAuthMigration extends Migration
{

    public function up()
    {
        Schema::create('ApiAuth', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->bigInteger('uid');
            $table->string('client_key', 100)->nullable();
            $table->string('client_secret', 100)->nullable();
            $table->string('token', 100)->nullable();
            $table->string('api_key', 100)->nullable();
            $table->integer('active')->default(1);
            $table->timestamps();
        });
    }

    public function down()
    {
        Schema::dropIfExists('ApiAuth');
    }
}
