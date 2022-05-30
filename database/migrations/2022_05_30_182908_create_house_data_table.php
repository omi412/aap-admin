<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateHouseDataTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('house_data', function (Blueprint $table) {
            $table->id();
            $table->string('owner',250);
            $table->string('house_no',250);
            $table->string('address_line_1',250)->nullable();
            $table->string('address_line_2',250)->nullable();
            $table->integer('ward')->nullable();
            $table->text('remarks')->nullable();
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
        Schema::dropIfExists('house_data');
    }
}
