<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddMoreFieldsToTaskStatusTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('task_status', function (Blueprint $table) {
            $table->string('volunteer_name',200);
            $table->string('status',100);
            $table->string('image')->default('default.jpg');
            $table->string('remarks',200);
            $table->string('address',200);

        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('task_status', function (Blueprint $table) {
            $table->dropColumn('volunteer_name');
            $table->dropColumn('status');
            $table->dropColumn('image');
            $table->dropColumn('remarks');
            $table->dropColumn('address');
        });
    }
}
