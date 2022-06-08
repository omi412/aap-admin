<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AdditionFileldsToUsersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('users', function (Blueprint $table) {
            $table->string('role_mandal')->nullable();
            $table->integer('ward_id')->nullable();
            $table->integer('booth_id')->nullable();
            $table->integer('gali_id')->nullable();
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
            $table->dropColumn('role_mandal');
            $table->dropColumn('ward_id');
            $table->dropColumn('booth_id');
            $table->dropColumn('gali_id');
        });
    }
}
