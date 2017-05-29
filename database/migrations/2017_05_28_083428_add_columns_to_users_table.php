<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class AddColumnsToUsersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('users', function (Blueprint $table) {
            //
            $table->string('phone')->nullable();
            $table->string('adderess')->nullable();
            $table->integer('inn')->unsigned()->nullable();
            $table->string('type_of_activity')->nullable();
            $table->string('ogrn')->nullable();
            $table->string('website')->nullable();
            $table->text('about')->nullable();

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
            $table->dropColumn(['phone', 'adderess', 'inn','type_of_activity','ogrn','site','about']);
        });
    }
}
