<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateCarEquipmentsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('car_equipments', function (Blueprint $table) {
            $table->increments('id');
            $table->string('name');
            $table->integer('id_car_modification');
            $table->integer('price_min');
            $table->integer('price');
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
        Schema::drop('car_equipments');
    }
}
