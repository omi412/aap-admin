<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddCreatedByUpdatedByFieldToAllTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        if (!Schema::hasColumn('users', 'created_by') && !Schema::hasColumn('users', 'updated_by'))
        {
            Schema::table('users', function (Blueprint $table)
            {
                $table->unsignedBigInteger('created_by')->nullable();
                $table->unsignedBigInteger('updated_by')->nullable();
            });
        }
        if (!Schema::hasColumn('contacts', 'created_by') && !Schema::hasColumn('contacts', 'updated_by'))
        {
            Schema::table('contacts', function (Blueprint $table)
            {
                $table->unsignedBigInteger('created_by')->nullable();
                $table->unsignedBigInteger('updated_by')->nullable();
            });
        }
        if (!Schema::hasColumn('house_data', 'created_by') && !Schema::hasColumn('house_data', 'updated_by'))
        {
            Schema::table('house_data', function (Blueprint $table)
            {
                $table->unsignedBigInteger('created_by')->nullable();
                $table->unsignedBigInteger('updated_by')->nullable();
            });
        }
        if (!Schema::hasColumn('messagings', 'created_by') && !Schema::hasColumn('messagings', 'updated_by'))
        {
            Schema::table('messagings', function (Blueprint $table)
            {
                $table->unsignedBigInteger('created_by')->nullable();
                $table->unsignedBigInteger('updated_by')->nullable();
            });
        }
        if (!Schema::hasColumn('permissions', 'created_by') && !Schema::hasColumn('permissions', 'updated_by'))
        {
            Schema::table('permissions', function (Blueprint $table)
            {
                $table->unsignedBigInteger('created_by')->nullable();
                $table->unsignedBigInteger('updated_by')->nullable();
            });
        }
        if (!Schema::hasColumn('roles', 'created_by') && !Schema::hasColumn('roles', 'updated_by'))
        {
            Schema::table('roles', function (Blueprint $table)
            {
                $table->unsignedBigInteger('created_by')->nullable();
                $table->unsignedBigInteger('updated_by')->nullable();
            });
        }
        if (!Schema::hasColumn('role_details', 'created_by') && !Schema::hasColumn('role_details', 'updated_by'))
        {
            Schema::table('role_details', function (Blueprint $table)
            {
                $table->unsignedBigInteger('created_by')->nullable();
                $table->unsignedBigInteger('updated_by')->nullable();
            });
        }
        if (!Schema::hasColumn('role_user', 'created_by') && !Schema::hasColumn('role_user', 'updated_by'))
        {
            Schema::table('role_user', function (Blueprint $table)
            {
                $table->unsignedBigInteger('created_by')->nullable();
                $table->unsignedBigInteger('updated_by')->nullable();
            });
        }
        if (!Schema::hasColumn('task_status', 'created_by') && !Schema::hasColumn('task_status', 'updated_by'))
        {
            Schema::table('task_status', function (Blueprint $table)
            {
                $table->unsignedBigInteger('created_by')->nullable();
                $table->unsignedBigInteger('updated_by')->nullable();
            });
        }
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        if (Schema::hasColumn('users', 'created_by') && Schema::hasColumn('users', 'updated_by'))
        {
            Schema::table('users', function (Blueprint $table)
            {
                $table->dropColumn('created_by');
                $table->dropColumn('updated_by');
            });
        }
        if (Schema::hasColumn('contacts', 'created_by') && Schema::hasColumn('contacts', 'updated_by'))
        {
            Schema::table('contacts', function (Blueprint $table)
            {
                $table->dropColumn('created_by');
                $table->dropColumn('updated_by');
            });
        }
        if (Schema::hasColumn('house_data', 'created_by') && Schema::hasColumn('house_data', 'updated_by'))
        {
            Schema::table('house_data', function (Blueprint $table)
            {
                $table->dropColumn('created_by');
                $table->dropColumn('updated_by');
            });
        }
        if (Schema::hasColumn('messagings', 'created_by') && Schema::hasColumn('messagings', 'updated_by'))
        {
            Schema::table('messagings', function (Blueprint $table)
            {
                $table->dropColumn('created_by');
                $table->dropColumn('updated_by');
            });
        }
        if (Schema::hasColumn('permissions', 'created_by') && Schema::hasColumn('permissions', 'updated_by'))
        {
            Schema::table('permissions', function (Blueprint $table)
            {
                $table->dropColumn('created_by');
                $table->dropColumn('updated_by');
            });
        }
        if (Schema::hasColumn('roles', 'created_by') && Schema::hasColumn('roles', 'updated_by'))
        {
            Schema::table('roles', function (Blueprint $table)
            {
                $table->dropColumn('created_by');
                $table->dropColumn('updated_by');
            });
        }
        if (Schema::hasColumn('role_details', 'created_by') && Schema::hasColumn('role_details', 'updated_by'))
        {
            Schema::table('role_details', function (Blueprint $table)
            {
                $table->dropColumn('created_by');
                $table->dropColumn('updated_by');
            });
        }
        if (Schema::hasColumn('role_user', 'created_by') && Schema::hasColumn('role_user', 'updated_by'))
        {
            Schema::table('role_user', function (Blueprint $table)
            {
                $table->dropColumn('created_by');
                $table->dropColumn('updated_by');
            });
        }
        if (Schema::hasColumn('task_status', 'created_by') && Schema::hasColumn('task_status', 'updated_by'))
        {
            Schema::table('task_status', function (Blueprint $table)
            {
                $table->dropColumn('created_by');
                $table->dropColumn('updated_by');
            });
        }
    }
}
