<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class UserTagsDemand extends Migration
{
    public function up()
    {
        Schema::table('users', function (Blueprint $table) {
            //
            $table->text('tags_demand')->nullable();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('users', function (Blueprint $table) {
            $table->dropColumn('tags_demand');
        });
    }
}
