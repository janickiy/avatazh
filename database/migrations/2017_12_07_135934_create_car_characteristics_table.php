<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateCarCharacteristicsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('car_characteristics', function (Blueprint $table) {
            $table->increments('id');
            $table->string('name');
            $table->integer('id_parent')->nullable();
            $table->integer('id_car_type')->index('id_car_type');
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
        Schema::drop('car_characteristics');
    }
}
