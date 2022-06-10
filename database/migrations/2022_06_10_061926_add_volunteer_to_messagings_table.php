<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddVolunteerToMessagingsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('messagings', function (Blueprint $table) {
            $table->unsignedBigInteger('volunteer')->comment('pk users table');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('messagings', function (Blueprint $table) {
             $table->dropColumn('volunteer');
        });
    }
}
