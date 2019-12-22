<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class TodoArchiveSoftDeleteOrderPriority extends Migration
{
    public function up()
    {
        Schema::table('Todo_Tasks', function($table) {
            $table->dateTime('archived_at')->nullable();
            $table->integer('order')->default(0);
            $table->integer('priority')->default(0);
            $table->softDeletes();
        });
    }

    public function down()
    {
        Schema::table('Todo_Tasks', function($table) {
            $table->dropColumn('archived_at');
            $table->dropColumn('order');
            $table->dropColumn('priority');
        });
    }
}
