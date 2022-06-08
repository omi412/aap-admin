<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddFileldsToUsersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('users', function (Blueprint $table) {
            $table->string('role');
            $table->string('role_mandal');
            $table->integer('ward_id');
            $table->integer('booth_id');
            $table->integer('gali_id');
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
            $table->dropColumn('role');
            $table->dropColumn('role_mandal');
            $table->dropColumn('ward_id');
            $table->dropColumn('booth_id');
            $table->dropColumn('gali_id');
        });
    }
}
