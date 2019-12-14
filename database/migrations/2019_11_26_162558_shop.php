<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class Shop extends Migration
{
    public function up() {
        Schema::create('shopCategories', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('name');
            $table->timestamps();
        });
        Schema::create('shopProducts', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('sku');
            $table->binary('categories');
            $table->string('name');
            $table->string('short_description');
            $table->binary('long_description');
            $table->decimal('amount',9,3);
            $table->binary('meta');
            $table->timestamps();
        });
        Schema::create('shopTransactions', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('name');
            $table->string('tid');
            $table->decimal('amount',9,3);
            $table->binary('cart');
            $table->timestamps();
        });
    }

    public function down() {
        Schema::dropIfExists('shopCategories');
        Schema::dropIfExists('shopProducts');
        Schema::dropIfExists('shopTransactions');
    }
}
