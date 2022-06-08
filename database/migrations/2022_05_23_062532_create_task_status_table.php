<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateTaskStatusTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('task_status', function (Blueprint $table) {
            $table->id();
            $table->string('task_title',250)->nullable();
            $table->unsignedBigInteger('assign_to')->comment('pk role table');
            $table->text('task_description')->nullable();
            $table->unsignedBigInteger('volunteer')->comment('pk users table');
            $table->tinyInteger('status')->default(0);
            $table->string('image')->default('default.jpg');
            $table->text('remarks')->nullable();
            $table->string('address',250)->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('task_status');
    }
}
