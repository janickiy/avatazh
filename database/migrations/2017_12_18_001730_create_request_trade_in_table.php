<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateRequestTradeInTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('request_trade_in', function (Blueprint $table) {
            $table->increments('id');
            $table->string('name')->comment('ФИО');
            $table->integer('age')->nullable()->comment('возвраст');
            $table->string('phone')->comment('телефон');
            $table->string('email')->nullable()->comment('email');
            $table->string('ip')->nullable()->comment('ip');
            $table->string('mark')->comment('марка');
            $table->string('model')->comment('модель');
            $table->integer('mileage')->comment('пробег');
            $table->string('gearbox')->comment('кпп');
            $table->string('trade_in_mark')->comment('марка новый автомобиль');
            $table->string('trade_in_model')->comment('модель новый автомобиль');
            $table->string('photo')->comment('фото');
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
        Schema::drop('request_trade_in');
    }
}
