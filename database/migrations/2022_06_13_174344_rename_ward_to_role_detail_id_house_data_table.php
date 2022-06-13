<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class RenameWardToRoleDetailIdHouseDataTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('house_data', function (Blueprint $table) {
            $table->renameColumn('ward', 'role_detail_id');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('house_data', function (Blueprint $table) {
            $table->renameColumn('role_detail_id', 'ward');
        });
    }
}
