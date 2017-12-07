<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateCarOptionValuesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('car_option_values', function (Blueprint $table) {
            $table->increments('id');
            $table->tinyInteger('is_base');
            $table->integer('id_car_option');
            $table->integer('id_car_equipment');
            $table->integer('id_car_type');
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
        Schema::drop('car_option_values');
    }
}
